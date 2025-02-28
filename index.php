<?php

require __DIR__.'/config/autoload.php';

use App\Model\Project;

echo Project::env('APP_NAME');
echo PHP_EOL;
