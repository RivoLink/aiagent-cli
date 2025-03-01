<?php

namespace Tests\Model;

use App\Model\Console;
use PHPUnit\Framework\TestCase;

class ConsoleTest extends TestCase
{
    public function testOutMethod() {
        ob_start();
        Console::out('info', 'This is an info message');

        $output = ob_get_clean();
        $expected = "\033[34m[INFO]: This is an info message\033[0m".PHP_EOL;

        $this->assertEquals($expected, $output);
    }

    public function testOutMethodWithUnknownType() {
        ob_start();
        Console::out('unknown', 'This is an unknown message');

        $output = ob_get_clean();
        $expected = "\033[0mThis is an unknown message\033[0m".PHP_EOL;

        $this->assertEquals($expected, $output);
    }

    public function testOutMethodWithErrorType() {
        ob_start();
        Console::out('error', 'This is an error message');

        $output = ob_get_clean();
        $expected = "\033[31m[ERRO]: This is an error message\033[0m".PHP_EOL;

        $this->assertEquals($expected, $output);
    }

    public function testOutMethodWithSuccessType() {
        ob_start();
        Console::out('success', 'This is a success message');

        $output = ob_get_clean();
        $expected = "\033[32m[SUCC]: This is a success message\033[0m".PHP_EOL;

        $this->assertEquals($expected, $output);
    }

    public function testOutMethodWithWarningType() {
        ob_start();
        Console::out('warning', 'This is a warning message');

        $output = ob_get_clean();
        $expected = "\033[33m[WARN]: This is a warning message\033[0m".PHP_EOL;

        $this->assertEquals($expected, $output);
    }
}
