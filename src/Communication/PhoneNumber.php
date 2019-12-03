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
}
