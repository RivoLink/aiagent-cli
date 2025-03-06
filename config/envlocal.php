<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__."/autoload.php";

use App\Model\Project;

$PARAMS = getOpt('k::v::');

$KEY = $PARAMS['k'] ?? null;
$VALUE = $PARAMS['v'] ?? null;

if ($KEY && $VALUE) {
    Project::set(Project::dir("/.env.local"), $KEY, $VALUE);
}
