<?php

require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;

// Initialize $_ENV
$dotenv = Dotenv::createImmutable(__DIR__.'/..', ['.env.local', '.env']);
$dotenv->load();
