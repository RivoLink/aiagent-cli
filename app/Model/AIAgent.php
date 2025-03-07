<?php

namespace App\Model;

class AIAgent
{
    public static function help(string $self): int {
        $invoked = 'aiagent';

        if ($self == 'aiagent.php') {
            $invoked = 'php aiagent.php';
        } elseif (strpos($self, './') === 0) {
            $invoked = $self;
        } else {
            $invoked = basename($self);
        }

        Console::out('text', implode(PHP_EOL, [
            'Usage: '.$invoked.' --spelling="text" | --translate="text"',
            'Options:',
            '    --spelling   Corrects the spelling of the provided text.',
            '    --translate  Translates the provided text.',
            '    --help       Displays this help message.',
        ]));

        return 0;
    }
}
