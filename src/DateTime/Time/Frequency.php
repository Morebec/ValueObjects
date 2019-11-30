<?php

namespace Morebec\ValueObjects\DateTime\Time;

use Assert\Assertion;
use Exception;
use InvalidArgumentException;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Frequency is the number of occurrences of a repeating event per unit of time.
 * 3 times a day => new Frequency(3, new TimeAmount(1, TimeUnit::DAY())); // 3 times per 1 day
 * 2 times every 5 years => new Frequency(2, new TimeAmount(5, TimeUnit::YEARS)); // 2 times per 5 yers
 * 120 times per minute  => new Frequency(2, new TimeAmount(1, TimeUnit::MINUTE));
 */
class Frequency implements ValueObjectInterface
{
    /**
     * @var TimeAmount
     */
    private $amount;

    /**
     * @var int
     */
    private $nbTimes;

    public function __construct(int $nbTimes, TimeAmount $amount)
    {
        $this->amount = $amount;
        $this->nbTimes = $nbTimes;
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
        return sprintf("%s x %s", $this->nbTimes, (string)$this->amount);
    }

    public function getNbTimes(): int
    {
        return $this->nbTimes;
    }

    /**
     * @return TimeAmount
     */
    public function getAmount(): TimeAmount
    {
        return $this->amount;
    }

    public function getUnit(): TimeUnit
    {
        return $this->amount->getUnit();
    }

    /**
     * Returns a frequency object from a frequency notation string
     * Example "1 x 1 DAY" => once every day
     * Example "2 x 1 YEAR" => twice every year
     * Example "3 x 2 MONTH" => three times every two months
     * @param  string $frequency frequency string
     * @return Frequency
     */
    public function fromString(string $frequency): Frequency
    {
        Assertion::notBlank($frequency);

        // Make sure it is upper string for time unit constants
        $frequency = strtoupper($frequency);

        // Parse string according to "x" symbol
        try {
            list($nbTimes, $timeAmount) = explode('X', $frequency);
        } catch (Exception $e) {
            throw new InvalidArgumentException(
                "Malformed frequency string: No 'x' character found in '$frequency'"
            );
        }

        // Validate Number of times
        $nbTimes = trim($nbTimes);
        Assertion::numeric($nbTimes);
        $nbTimes = intval($nbTimes);

        // Validate time amount
        Assertion::notBlank(
            $timeAmount,
            "Malformed frequency string: The time amount portion of the string could not be parsed in '$frequency'"
        );
        $timeAmount = trim($timeAmount);

        try {
            list($amount, $unit) = explode(' ', $timeAmount);
        } catch (Exception $e) {
            throw new InvalidArgumentException(
                "Malformed frequency string: The time amount portion of the string could not be parsed, because no space character was found between the amount and the unit in '$frequency'"
            );
        }
        Assertion::numeric($amount);
        $amount = floatval($amount);

        return new Frequency($nbTimes, new TimeAmount($amount, TimeUnit::fromString($unit)));
    }
}
