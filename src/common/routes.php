<?php declare(strict_types = 1);

return [
    ['GET', '/hello-world', function () {
        echo 'Hello World';
    }],
    ['GET', '/workout/add', function () {
        echo 'This works too';
    }],
];