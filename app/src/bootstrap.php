<?php declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/', function () {
  print_r($_REQUEST);
  return 'Hello World!';
});
$klein->respond('GET', '/hello-world', function () {
  print_r($_REQUEST);
  return 'Hello World!';
});

$klein->dispatch();
