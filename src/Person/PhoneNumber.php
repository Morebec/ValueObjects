<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * PhoneNumber
 */
class PhoneNumber extends StringBasedValueObject
{
    public function __construct(string $phoneNumber)
    {
        Assertion::notBlank($phoneNumber);
        parent::__construct($phoneNumber);
    }
}
