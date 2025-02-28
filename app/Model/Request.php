<?php

namespace App\Model;

class Request
{
    /**
     * @param non-empty-string $url
     * @param array<int, string>|null $header
     * @return array<string, string>
     */
    public static function get(string $url, ?array $header = null): array {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header ?? ['Content-Type: application/json']);

        $resp = curl_exec($curl);
        curl_close($curl);

        /** @var array<string, string> */
        return json_decode((string)$resp, true) ?? [];
    }

    /**
     * @param non-empty-string $url
     * @param array<string, string> $data
     * @param array<int, string>|null $header
     * @return array<string, string>
     */
    public static function post(string $url, array $data = [], ?array $header = null): array {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header ?? ['Content-Type: application/json']);

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, (string)json_encode($data));

        $resp = curl_exec($curl);
        curl_close($curl);

        /** @var array<string, string> */
        return json_decode((string)$resp, true) ?? [];
    }
}
