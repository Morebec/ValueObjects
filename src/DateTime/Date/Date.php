<?php

namespace Morebec\ValueObjects\DateTime\Date;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Represents a date
 */
class Date implements ValueObjectInterface
{
    /** @var Year */
    private $year;

    /** @var Month */
    private $month;

    /** @var Day */
    private $day;

    public function __construct(Year $year, Month $month, Day $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        (string)$this === (string)$valueObject;
    }

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf("%s-%s-%s", $this->year, $this->month, $this->day);
    }

    /**
     * Returns the year of the date
     * @return Year
     */
    public function getYear(): Year
    {
        return $this->year;
    }

    /**
     * Returns the month of the date
     * @return Month
     */
    public function getMonth(): Month
    {
        return $this->month;
    }

    /**
     * Returns the day of the date
     * @return mixed
     */
    public function getDay(): Day
    {
        return $this->day;
    }

    /**
     * Returns the current Date
     * @return Date
     */
    public function now(): Date
    {
        return new static(Year::now(), Month::now(), Day::now());
    }
}
