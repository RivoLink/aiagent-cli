<?php

namespace App\Model;

use Diversen\Spinner;

class Process
{
    public static function async(callable $callback, string $message = 'Loading', string $spinner = 'dots'): mixed {
        return (new Spinner(spinner: $spinner, message: $message))->callback($callback);
    }
}
