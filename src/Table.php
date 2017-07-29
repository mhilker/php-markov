<?php

namespace MHilker\Markov;

use LogicException;

class Table
{
    /**
     * @var array
     */
    private $table;

    /**
     * @param Text $text
     * @param int $order
     */
    public function __construct(Text $text, int $order)
    {
        $this->table = array_merge(
            self::indexText($text, $order),
            self::countCharWeight($text, $order)
        );
    }

    /**
     * @param Text $text
     * @param int $order
     * @return array
     */
    private static function indexText(Text $text, int $order): array
    {
        $table = [];

        for ($i = 0; $i < $text->getLength(); $i++) {
            $char = $text->getSubstr($i, $order);

            if (isset($table[$char]) === false) {
                $table[$char] = [];
            }
        }

        return $table;
    }

    /**
     * @param Text $text
     * @param int $order
     * @return array
     */
    private static function countCharWeight(Text $text, int $order): array
    {
        $table = [];

        for ($i = 0; $i < $text->getLength() - $order; $i++) {
            $char = $text->getSubstr($i, $order);
            $follower = $text->getSubstr($i + $order, $order);

            if (isset($table[$char][$follower]) === true) {
                $table[$char][$follower]++;
            } else {
                $table[$char][$follower] = 1;
            }
        }

        return $table;
    }

    /**
     * @return string
     */
    public function getRandomChar(): string
    {
        $chars = array_keys($this->table);

        $length = count($chars);
        $rand = mt_rand(0, $length - 1);

        return $chars[$rand];
    }

    /**
     * @param string $current
     * @return string | null
     */
    public function getNextChar(string $current)
    {
        if (isset($this->table[$current]) === false) {
            return null;
        }

        if (empty($this->table[$current]) === true) {
            return null;
        }

        $sum = array_sum($this->table[$current]);
        $rand = mt_rand(0, $sum);

        foreach ($this->table[$current] as $next => $weight) {
            if ($rand <= $weight) {
                return $next;
            }
            $rand -= $weight;
        }

        throw new LogicException(sprintf(
            'Random value %s exeeds sum %d of all weights for char "%s".',
            $rand,
            $sum,
            $current
        ));
    }
}
