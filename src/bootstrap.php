<?php

declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/database.php';

define('LANDING_PAGE', '../static/js/index.html');

$klein = new \Klein\Klein();

$klein->respond(function ($request, $response, $service, $app) use ($klein) {
  // $app also can store lazy services, e.g. if you don't want to
  // instantiate a database connection on every response
  $app->register('db', function() {
    $hostname = 'localhost';$dbname = 'weight';
    $username = 'weight';$password = 'weight';
    $str = "pgsql:host=$hostname;port=5432;dbname=$dbname;user=$username;password=$password";
    return new PDO($str);
  });

});

$klein->respond('GET', '/phpinfo',
  function () {
    phpinfo();
  });

$klein->respond('GET', '/',
  function () {
    header('Location: ' . LANDING_PAGE);
    exit(0);
  });


// Group some calls under the `/workout` route namespace
$klein->with('/workout', function () use ($router, $controller_factory) {
    $controller = null;

    // Catch-all for this group to build the controller.
    // Make sure to pass in a REFERENCE to the controller variable!
    $klein->respond(function () use (&$controller, $controller_factory) {
        $controller = $controller_factory->buildWorkoutController();
    });

    // GET /workout/?
    $klein->respond('GET', '/add', [$controller, 'add']);

});

$klein->dispatch();
