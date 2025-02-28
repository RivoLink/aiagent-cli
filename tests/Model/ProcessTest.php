<?php

namespace Tests\Model;

use App\Model\Process;
use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    public function testAsyncMethod() {
        $callback = function () {
            return 'Callback executed';
        };

        $result = Process::async($callback);

        $this->assertEquals('Callback executed', $result);
    }
}
