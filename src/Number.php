<?php

namespace PL\Big;

/**
 * Class Number
 * @package PL\Big
 */
class Number
{
    /**
     * Add two big numbers
     *
     * @param string $arg1
     * @param string $arg2
     * @return string
     */
    public function sum(string $arg1, string $arg2) : string
    {
        $sum    = '';
        $remain = 0;

        // clear
        $arg1 = ltrim(preg_replace('/\D+/', '', $arg1), '0');
        $arg2 = ltrim(preg_replace('/\D+/', '', $arg2), '0');

        // first arg must be longer
        if (strlen($arg1) < strlen($arg2)) {
            $x    = $arg2;
            $arg2 = $arg1;
            $arg1 = $x;
        }

        // reverse
        $x = str_split(strrev($arg1));
        $y = str_split(strrev($arg2));

        foreach ($x as $k => $i) {
            $z       = $remain + $x[$k] + ($y[$k] ?? 0);
            $sum    .= $z % 10;
            $remain  = $z < 10 ? 0 : floor($z / 10);
        }

        // last remain
        if ($remain > 0) {
            $sum .= $remain;
        }

        return $sum ? strrev($sum) : '0';
    }
}
