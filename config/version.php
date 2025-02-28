<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__."/autoload.php";

use App\Model\Project;

$regex = "/^--release=(major|minor|patch)$/";

if ($argc !== 2 || !preg_match($regex, $argv[1], $matches)) {
    die("Usage: php {$argv[0]} --release=<major|minor|patch>".PHP_EOL);
}

$env = Project::dir("/.env");

if (!file_exists(".env")) {
    die("Error: .env file not found at $env".PHP_EOL);
}

$release = $matches[1];
$version = Project::env("APP_VERSION");

if (!preg_match("/^[0-9]+\.[0-9]+\.[0-9]+$/", $version)) {
    die("Error: Invalid version format in .env file".PHP_EOL);
}

list($major, $minor, $patch) = explode(".", $version);
list($major, $minor, $patch) = [(int)$major, (int)$minor, (int)$patch];

switch ($release) {
    case "major":
        $major++; $minor = 0; $patch = 0;
        break;
    case "minor":
        $minor++; $patch = 0;
        break;
    case "patch":
        $patch++;
        break;
    default:
        die("Error: Invalid release type $release".PHP_EOL);
}

Project::set($env, "APP_VERSION", "$major.$minor.$patch");
