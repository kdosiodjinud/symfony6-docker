#!/usr/bin/env php
<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;

if (!is_file(dirname(__DIR__).'/../vendor/autoload_runtime.php')) {
    throw new LogicException('Symfony Runtime is missing. Try running "composer require symfony/runtime".');
}

require_once dirname(__DIR__).'/../vendor/autoload_runtime.php';

(new Dotenv())->bootEnv(__DIR__ . '/../../.env.test');

$kernel = new Kernel('test', true);
$kernel->boot();

return $kernel->getContainer()->get('doctrine')->getManager();
