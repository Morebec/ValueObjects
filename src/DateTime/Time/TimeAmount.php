<?php 

namespace Morebec\ValueObjects\DateTime\Time;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * TimeAmount 1 year, 2 days, 1 week etc.
 */
class TimeAmount implements ValueObjectInterface
{
    private $amount;

    private $unit;

    function __construct(int $amount, TimeUnit $timeUnit)
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
        return sprintf("%s %s", $this->amount, $this->unit);
    }

    /**
     * @return int
     */
    public function getAmount(): int
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
}