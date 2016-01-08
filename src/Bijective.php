<?php

namespace Jarvis\Math;

/**
 * Encodes any integer into a base(n) string where n is alphabet's length.
 *
 * @author Eric Chau <eriic.chau@gmail.com>
 */
class Bijective
{
    const ALPHABET = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    protected $base;
    protected $alphabet;

    public function __construct($alphabet = self::ALPHABET)
    {
        $this->alphabet = $alphabet;
        $this->base = strlen($this->alphabet);
    }

    /**
     * Encodes integer into its associated string.
     *
     * @param  integer $int
     * @return string
     */
    public function encode($int)
    {
        if (0 === $int) {
            return $this->alphabet[0];
        }

        while (0 < $int) {
            $remainder = $int % $this->base;
            $str = $str . $this->alphabet[$remainder];
            $int = ($int - $remainder) / $this->base;
        }

        return strrev($str);
    }

    /**
     * Decodes string into its associated integer.
     *
     * @param  string $str
     * @return integer
     */
    public function decode($str)
    {
        $int = 0;
        foreach (str_split($str) as $char) {
            $int = ($int * $this->base) + strpos($this->alphabet, $char);
        }

        return $int;
    }
}
