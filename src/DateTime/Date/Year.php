<?php

namespace Morebec\ValueObjects\DateTime\Date;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Represents a year in time
 *
 * Negative numbers are considered as B.C.
 * As such the year 0 does not exists
 */
class Year extends IntBasedValueObject
{
    function __construct(int $yearNumber)
    {
        Assertion::notEq($yearNumber, 0);
        parent::__construct($yearNumber);
    }

    /**
     * Indicates if the year is a leap year
     * @return boolean
     */
    public function isLeapYear(): bool
    {
        return date('L', mktime(0, 0, 0, 1, 1, $this->value)) === '1';
    }

    /**
     * Indicates if the year is A.D.
     * @return boolean true if A.D. otherwise false
     */
    public function isAfterDeath(): bool
    {
        return $this->value >= 1;
    }

    /**
     * Indicates if the year is B.C.
     * @return boolean true if B.C. otherwise false
     */
    public function isBeforeChrist(): bool
    {
        return $this->value <= -1;
    }

    public function fromString(string $year): Year
    {
        Assertion::notBlank($year);
        Assertion::numeric($year);

        return new static(intval($year));
    }

    /**
     * Returns the current year
     * @return Year
     */
    public static function now(): Year
    {
        return new static(date('Y'));
    }
}