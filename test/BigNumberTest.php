<?php

use PL\Big\Number;

class BigNumberTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider cases
     */
    function testSum($arg1, $arg2, $exp)
    {
        $exp = preg_replace('/\D+/', '', $exp); // clear

        $bn = new Number();
        $sum = $bn->sum($arg1, $arg2);
        $this->assertEquals($exp, $sum);
    }

    function cases()
    {
        $cases = [
            [
                '2',
                '3',
                '5'
            ],
            [
                '9999999999999999999999999999999999999999',
                '1',
                '10000000000000000000000000000000000000000'
            ],
            [
                '97395723957239759328759324533245450',
                '34532450808340582345023345',
                '97395723991772210137099906878268795'
            ],
            [
                '0097395723 957239732425932 34228759324533245450',
                '003453223234 23442342450808340582345023345',
                '973 9917 718047396684935685037099906878268795'
            ],
        ];
        // todo create test on fly
        foreach ($cases as $y) {
            yield $y;
        }
    }
}
