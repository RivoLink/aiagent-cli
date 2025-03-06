<?php

namespace Tests\Model;

use App\Model\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    protected function setUp(): void {
        parent::setUp();
        $_ENV = [];
    }

    protected function tearDown(): void {
        $_ENV = [];
        parent::tearDown();
    }

    public function testDirReturnsCorrectProjectRootPath() {
        $expected = realpath(__DIR__.'/../../');
        $actual = Project::dir();
        $this->assertEquals($expected, $actual);
    }

    public function testDirReturnsCorrectConfigPath() {
        $expected = realpath(__DIR__.'/../../config');
        $actual = Project::dir('/config');
        $this->assertEquals($expected, $actual);
    }

    public function testDirReturnsCorrectConfigPathWithSuffix() {
        $expected = realpath(__DIR__.'/../../config/autoload.php');
        $actual = Project::dir('/config', '/autoload.php');
        $this->assertEquals($expected, $actual);
    }

    public function testEnvReturnsCorrectValueWhenSet() {
        $_ENV['TEST_KEY'] = 'test_value';
        $expected = 'test_value';
        $actual = Project::env('TEST_KEY');
        $this->assertEquals($expected, $actual);
    }

    public function testEnvReturnsDefaultValueWhenNotSet() {
        $expected = 'default_value';
        $actual = Project::env('NON_EXISTENT_KEY', 'default_value');
        $this->assertEquals($expected, $actual);
    }

    public function testEnvReturnsCorrectValueForIntegerWhenSet() {
        $_ENV['INT_VAL'] = 12345;
        $expected = '12345';
        $actual = Project::env('INT_VAL');
        $this->assertEquals($expected, $actual);
    }

    public function testEnvReturnsEmptyStringWhenNotSetAndNoDefaultProvided() {
        $expected = '';
        $actual = Project::env('NON_EXISTENT_KEY');
        $this->assertEquals($expected, $actual);
    }

    public function testExecReturnsCorrectOutputForSuccessfulCommand() {
        $cmd = 'echo "Hello, World!"';
        list($output, $errors) = Project::exec($cmd);

        $this->assertNotNull($output);
        $this->assertNull($errors);

        $this->assertEquals(['Hello, World!'], $output);
    }

    public function testExecReturnsCorrectOutputForFailedCommand() {
        $cmd = 'nonexistent_command';
        list($output, $errors) = Project::exec($cmd);

        $this->assertNull($output);
        $this->assertNotNull($errors);

        $this->assertStringContainsString('not found', implode(' ', $errors));
    }

    public function testExecCallsCallbackWithCorrectArguments() {
        $cmd = 'echo "Hello, World!"';
        $callbackCalled = false;

        $callback = function ($result, $errors) use (&$callbackCalled) {
            $callbackCalled = true;

            $this->assertNotNull($result);
            $this->assertNull($errors);

            $this->assertEquals(['Hello, World!'], $result);
        };

        Project::exec($cmd, $callback);

        $this->assertTrue($callbackCalled);
    }
}
