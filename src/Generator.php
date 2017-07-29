<?php

namespace MHilker\Markov;

class Generator
{
    /**
     * @param Table $table
     * @param int $length
     * @return Text
     */
    public function generateText(Table $table, int $length)
    {
        $char = $table->getRandomChar();
        $text = new Text($char);

        while ($text->getLength() < $length) {
            $char = $table->getNextChar($char);

            if ($char !== null) {
                $text->append($char);
            } else {
                $char = $table->getRandomChar();
            }
        }

        return $text;
    }
}
