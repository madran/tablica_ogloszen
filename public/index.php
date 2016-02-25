<?php
include __DIR__ . '/../vendor/autoload.php';
$config = include __DIR__ . '/../application/config/app_config.php';
$autoloader = new Mpf\Autoloader($config);
$app = new Mpf\Application($config);
$app->run();
