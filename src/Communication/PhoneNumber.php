<?php

namespace Morebec\ValueObjects\Communication;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a phone number
 */
class PhoneNumber extends StringBasedValueObject
{
    public function __construct(string $phoneNumber)
    {
        Assertion::notBlank($phoneNumber);
        parent::__construct($phoneNumber);
    }

    /**
     * Constructs an instance of this value object from a string value
     * @param string $value
     * @return static
     */
    public static function fromString(string $value): self
    {
        return new static($value);
    }
}
