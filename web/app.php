<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';
if (PHP_VERSION_ID < 70000) {
    include_once __DIR__.'/../var/bootstrap.php.cache';
}

switch (getenv('SYMFONY_ENV')) {
    case 'prod':
        $env = getenv('SYMFONY_ENV');
        $debug = true;
        break;

    case 'dev':
        umask(0000);
        $env = getenv('SYMFONY_ENV');
        $debug = true;
        break;
}

$kernel = new AppKernel($env, $debug);
if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
}
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
