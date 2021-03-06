<?php

namespace Morebec\ValueObjects\DateTime\Date;

use Assert\Assertion;
use Morebec\ValueObjects\BasicEnum;

/**
 * Represents a certain day of the week
 *
 * @method static WeekDay MONDAY()
 * @method static WeekDay TUESDAY()
 * @method static WeekDay WEDNESDAY()
 * @method static WeekDay THURSDAY()
 * @method static WeekDay FRIDAY()
 * @method static WeekDay SATURDAY()
 * @method static WeekDay SUNDAY()
 */
class WeekDay extends BasicEnum
{
    const MONDAY    = 'MONDAY';
    const TUESDAY   = 'TUESDAY';
    const WEDNESDAY = 'WEDNESDAY';
    const THURSDAY  = 'THURSDAY';
    const FRIDAY    = 'FRIDAY';
    const SATURDAY  = 'SATURDAY';
    const SUNDAY    = 'SUNDAY';

    /**
     * Returns the weekday associated with the provided number
     * 1 is monday, 2 is tuesday etc.
     * @param  int    $dayNumber day number
     * @return WeekDay
     */
    public static function fromNumber(int $dayNumber): WeekDay
    {
        Assertion::between($dayNumber, 1, 7);
        switch ($dayNumber) {
            case 1:
                return static::MONDAY();
            case 2:
                return static::TUESDAY();
            case 3:
                return static::WEDNESDAY();
            case 4:
                return static::THURSDAY();
            case 5:
                return static::FRIDAY();
            case 6:
                return static::SATURDAY();
            case 7:
                return static::SUNDAY();
        }
    }

    /**
     * Returns a Month instance from a string
     * @param  string $month month
     * @return WeekDay
     */
    public static function fromString(string $month): WeekDay
    {
        $month = strtoupper($month);
        Assertion::notBlank($month);
        // Further validation is made in constructor
        return new static($month);
    }

    /**
     * Returns the current year
     * @return WeekDay
     */
    public static function now(): WeekDay
    {
        $weekDayName = strtoupper(date('l'));

        return new static($weekDayName);
    }
}
