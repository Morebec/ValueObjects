<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * TimeAmount 1 year, 2 days, 1 week etc.
 */
class TimeAmount implements ValueObjectInterface
{
    /** @var float */
    private $amount;

    /** @var TimeUnit */
    private $unit;

    public function __construct(float $amount, TimeUnit $unit)
    {
        $this->amount = $amount;
        $this->unit = $unit;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return (string)$this === (string)$valueObject;
    }

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf("%s %s", (float)$this->amount, $this->unit);
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return TimeUnit
     */
    public function getUnit(): TimeUnit
    {
        return $this->unit;
    }

    /**
     * Converts this amount of time to another unit
     * given that:
     * - a month is 4 weeks
     * - a year is 365 days
     *
     * @param  TimeUnit $unit new unit
     * @return TimeAmount amount with new unit
     */
    public function convertToUnit(TimeUnit $unit): TimeAmount
    {
        $equivs = [];

        $equivs[TimeUnit::MILLISECOND] = 1;
        $equivs[TimeUnit::SECOND] = $equivs[TimeUnit::MILLISECOND] * 1000;
        $equivs[TimeUnit::MINUTE] = $equivs[TimeUnit::SECOND] * 60;
        $equivs[TimeUnit::HOUR] = $equivs[TimeUnit::MINUTE] * 60;
        $equivs[TimeUnit::DAY] = $equivs[TimeUnit::HOUR] * 24;
        $equivs[TimeUnit::WEEK] = $equivs[TimeUnit::DAY] * 7;
        $equivs[TimeUnit::MONTH] = $equivs[TimeUnit::WEEK] * 4;
        $equivs[TimeUnit::YEAR] = $equivs[TimeUnit::DAY] * 365;

        $from = $this->amount * $equivs[(string)$this->unit];
        $to = $equivs[(string)$unit];

        return new TimeAmount($from / $to, $unit);
    }
}
