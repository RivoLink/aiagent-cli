<?php

namespace App\Model;

class Console
{
    private const SPACE = ' ';

    public static function line(): void {
        echo PHP_EOL;
    }

    public static function out(string $type, string $message, int $return = 0, string $suffix = ''): int {
        $colors = [
            'error' => "\033[31m", // Red
            'info' => "\033[34m", // Blue
            'success' => "\033[32m", // Green
            'warning' => "\033[33m", // Yellow
            'reset' => "\033[0m", // Reset
        ];

        $prefixes = [
            'error' => '[ERRO]: ',
            'info' => '[INFO]: ',
            'success' => '[SUCC]: ',
            'warning' => '[WARN]: ',
        ];

        if (!isset($colors[$type]) || !isset($prefixes[$type])) {
            $type = 'info';
        }

        echo trim($colors[$type].$prefixes[$type].$message.$colors['reset'].self::SPACE.$suffix).PHP_EOL;
        return $return;
    }

    public static function chat(string $text, int $delay = 10000): void {
        $length = strlen($text);

        for ($i = 0; $i < $length; $i++) {
            echo $text[$i];
            usleep($delay);
            flush();
        }

        echo PHP_EOL;
    }

    /**
     * @param array<string> $choices
     */
    public static function ask(string $question, array $choices, int $default = 0): string {
        $default = "\033[36m".$choices[isset($choices[$default]) ? $default : 0]."\033[0m";
        $question = "\033[36m[QUES]: ".$question."\033[0m";

        echo sprintf('%s (%s) [%s]: ', $question, implode('/', $choices), $default);
        return trim((string)fgets(STDIN));
    }
}
