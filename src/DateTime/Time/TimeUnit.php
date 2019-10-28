<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Morebec\ValueObjects\BasicEnum;

/**
 * Represents a unit of time (a year, a day, an hour, a second, a week etc.)
 */
class TimeUnit extends BasicEnum
{
    const MILLISECOND = 'MILLISECOND';
    const SECOND = 'SECOND';
    const MINUTE = 'MINUTE';
    const HOUR = 'HOUR';
    const DAY = 'DAY';
    const WEEK = 'WEEK';
    const MONTH = 'MONTH';
    const YEAR = 'YEAR';

    /**
     * Used so it is poossible to do things like
     * WeekDay::MONDAY()
     */
    public static function __callStatic($method, $arguments)
    {
        static::validateValue($method);
        return new static($method);
    }

    public static function fromString(string $name): TimeUnit
    {
        $name = strtoupper($name);
        Assertion::notBlank($name);
        // Further validation is made in constructor
        return new static($name);
    }
}