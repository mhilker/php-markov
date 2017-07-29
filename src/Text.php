<?php

namespace MHilker\Markov;

class Text
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return strlen($this->value);
    }

    /**
     * @param int $offset
     * @param int $length
     * @return string
     */
    public function getSubstr(int $offset, int $length): string
    {
        return substr($this->value, $offset, $length);
    }

    /**
     * @param string $char
     * @return void
     */
    public function append(string $char)
    {
        $this->value .= $char;
    }
}
