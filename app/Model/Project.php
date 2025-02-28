<?php

namespace App\Model;

class Project
{
    public static function dir(string $path = '', string $suffix = ''): string {
        return (string)realpath(__DIR__.'/../..'.$path).$suffix;
    }

    public static function env(string $key, string $default = ''): string {
        return (string)($_ENV[$key] ?? $default); // @phpstan-ignore-line
    }

    public static function set(string $path, string $key, string $newValue): void {
        /** @var list<string> */
        $lines = file($path, FILE_IGNORE_NEW_LINES);

        foreach ($lines as &$line) {
            if (!is_int(strpos($line, '='))) {
                continue;
            }

            list($currKey, $currValue) = explode('=', $line, 2);
            $currKey = trim($currKey);
            $currValue = trim($currValue);

            if ($currKey !== $key) {
                continue;
            }

            if (preg_match('/^([\'"])(.*)\1$/', $currValue, $matches)) {
                $quote = $matches[1];
            } else {
                $quote = '';
            }

            $line = str_replace($currValue, $quote.$newValue.$quote, $line);
        }

        file_put_contents($path, implode(PHP_EOL, $lines));
    }
}
