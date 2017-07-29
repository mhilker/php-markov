<?php

use MHilker\Markov\Generator;
use MHilker\Markov\Table;
use MHilker\Markov\Text;

require __DIR__ . '/../vendor/autoload.php';

$text = file_get_contents(__DIR__ . '/stars.txt');
$text = str_replace(PHP_EOL, ' ', $text);

$text = new Text($text);
$table = new Table($text, 3);
$generator = new Generator();

for ($i = 0; $i < 10; $i++) {
    echo trim($generator->generateText($table, 8)) . PHP_EOL;
}
