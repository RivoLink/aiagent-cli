#!/usr/bin/env php
<?php

require __DIR__.'/config/autoload.php';

use App\Model\AIAgent;
use App\Model\Console;
use App\Model\Process;
use App\Model\Project;
use App\Model\Request;

/** @var array<string, string> */
$PARAMS = getOpt('', ['spelling::', 'translate::', 'help']);

/** @var string $SELF */
$SELF = $_SERVER['PHP_SELF'];

$TEXT = null;
$ACTION = null;

foreach ($PARAMS as $action => $text) {
    if ($action && $text) {
        $ACTION = $action;
        $TEXT = $text;
        break;
    }
}

if (isset($PARAMS['help']) || !$ACTION || !$TEXT) {
    exit(AIAgent::help($SELF));
}

$output = Process::async(message: 'Processing', callback: function () use ($ACTION, $TEXT) {
    $webhook_url = Project::env('WEBHOOK_URL');
    $webhook_token = Project::env('WEBHOOK_TOKEN');

    $header = [
        'Content-Type: application/json',
        'Authorization: Bearer '.$webhook_token,
    ];

    $post = [
        'action' => $ACTION,
        'text' => $TEXT,
    ];

    $response = Request::post($webhook_url.'/lexifix', $post, $header);

    if (array_key_exists('output', $response)) {
        return trim($response['output']);
    }

    return null;
});

if (!is_string($output)) {
    exit(Console::out('error', 'Unable to connect to webhook.', 1));
}

Console::chat($output);
