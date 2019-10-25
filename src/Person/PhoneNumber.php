<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * PhoneNumber
 */
class PhoneNumber implements ValueObjectInterface
{
    /** @var string */
    private $phoneNumber;

    public function __construct(string $phoneNumber)
    {
        Assertion::notBlank($phoneNumber);
        $this->phoneNumber = $phoneNumber;
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
        return $this->phoneNumber;
    }
}
