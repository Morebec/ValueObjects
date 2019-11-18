<?php

namespace Morebec\ValueObjects\DateTime\Date;

use Assert\Assertion;
use Morebec\ValueObjects\BasicEnum;

/**
 * Represents a certain month in a year
 */
class Month extends BasicEnum
{
    const JANUARY = 'JANUARY';
    const FEBRUARY = 'FEBRUARY';
    const MARCH = 'MARCH';
    const APRIL = 'APRIL';
    const MAY = 'MAY';
    const JUNE = 'JUNE';
    const JULY = 'JULY';
    const AUGUST = 'AUGUST';
    const SEPTEMBER = 'SEPTEMBER';
    const OCTOBER = 'OCTOBER';
    const NOVEMBER = 'NOVEMBER';
    const DECEMBER = 'DECEMBER';

    /**
     * Returns a month from its number
     * e.g. Januery =, February = 2
     * @param  int    $monthNumber number of the month
     * @return [type]              [description]
     */
    public function fromNumber(int $monthNumber): Month
    {
        Assertion::between($monthNumber, 1, 12);

        switch ($monthNumber) {
           case 1:
               return Month::JANUARY();
           case 2:
               return Month::FEBRUARY();
           case 3:
               return Month::MARCH();
           case 4:
               return Month::APRIL();
           case 5:
               return Month::MAY();
           case 6:
               return Month::JUNE();
           case 7:
               return Month::JULY();
           case 8:
               return Month::AUGUST();
           case 9:
               return Month::SEPTEMBER();
           case 10:
               return Month::OCTOBER();
           case 11:
               return Month::NOVEMBER();
           case 12:
               return Month::DECEMBER();
        }
    }

    /**
     * Returns a Month instance from a string
     * @param  string $month month
     * @return Month
     */
    public static function fromString(string $month): Month
    {
        $month = strtoupper($month);
        Assertion::notBlank($month);
        // Further validation is made in constructor
        return new static($month);
    }

    /**
     * Used so it is poossible to do things like
     * Month::January()
     */
    public static function __callStatic($method, $arguments)
    {
        static::validateValue($method);
        return new static($method);
    }

    /**
     * Returns the current year
     * @return Year
     */
    public static function now(): Month
    {
        return new static(strtoupper(date('F')));
    }
}
