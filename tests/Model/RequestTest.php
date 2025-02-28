<?php

namespace Tests\Model;

use App\Model\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testGetRequest() {
        $url = 'https://httpbin.org/get';

        $response = Request::get($url);

        $this->assertArrayHasKey('url', $response);
        $this->assertEquals($url, $response['url']);
    }

    public function testPostRequest() {
        $url = 'https://httpbin.org/post';
        $data = ['key' => 'value'];

        $response = Request::post($url, $data);

        $this->assertArrayHasKey('json', $response);
        $this->assertEquals($data, $response['json']);
    }
}
