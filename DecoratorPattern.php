<?php

interface TextDecorator {
    public function decorate(string $text): string;
}

class BoldDecorator implements TextDecorator {
    public function decorate(string $text): string {
        return '<b>' . $text . '</b>';
    }
}

class ItalicDecorator implements TextDecorator {
    public function decorate(string $text): string {
        return '<i>' . $text . '</i>';
    }
}

function decorateText(string $text, TextDecorator $decorator): string {
    return $decorator->decorate($text);
}

$text = 'Hello, world!';

echo decorateText($text, new BoldDecorator()); // <b>Hello, world!</b>
echo decorateText($text, new ItalicDecorator()); // <i>Hello, world!</i>

?>
