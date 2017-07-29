<?php

require_once __DIR__ . '/../vendor/autoload.php';

//Return processed Kernel
$kernel = new \App\Kernel;

$kernel = $kernel->createFromGlobals('dev');

$request = $kernel->request();
$response = $kernel->response();

$kernel->dispatch();