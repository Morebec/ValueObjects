<?php 

namespace Morebec\ValueObjects\DateTime\Time;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Frequency is the number of occurrences of a repeating event per unit of time.
 * 3 times a day => new Frequency(3, new TimeAmount(1, TimeUnit::DAY())); // 3 times per 1 day
 * 2 times every 5 years => new Frequency(2, new TimeAmount(5, TimeUnit::YEARS)); // 2 times per 5 yers
 * 120 times per minute  => new Frequency(2, new TimeAmount(1, TimeUnit::MINUTE));
 */
class Frequency implements ValueObjectInterface
{
    function __construct(int $nbTimes, TimeAmount $amount)
    {
        $this->nbTimes = $nbTimes;
        $this->amount = $amount;
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
        return sprintf("%s x %s", $this->nbTImes, (string)$this->amount);
    }

    public function getNbTimes(): int
    {
        return $this->nbTimes;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount->getAmount();
    }

    public function getUnit(): Unit
    {
        return $this->amount->getUnit();
    }
}