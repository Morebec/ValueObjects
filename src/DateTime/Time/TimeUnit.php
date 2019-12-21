<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Morebec\ValueObjects\BasicEnum;

/**
 * Represents a unit of time (a year, a day, an hour, a second, a week etc.)
 * @method static MILLISECOND(): self
 * @method static SECOND(): self
 * @method static MINUTE(): self
 * @method static HOUR(): self
 * @method static DAY(): self
 * @method static WEEK(): self
 * @method static MONTH(): self
 * @method static YEAR(): self
 */
class TimeUnit extends BasicEnum
{
    public const MILLISECOND = 'MILLISECOND';
    public const SECOND = 'SECOND';
    public const MINUTE = 'MINUTE';
    public const HOUR = 'HOUR';
    public const DAY = 'DAY';
    public const WEEK = 'WEEK';
    public const MONTH = 'MONTH';
    public const YEAR = 'YEAR';

    public static function fromString(string $name): TimeUnit
    {
        self::WEEK();
        $name = strtoupper($name);
        Assertion::notBlank($name);
        // Further validation is made in constructor
        return new static($name);
    }
}
