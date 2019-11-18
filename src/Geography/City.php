<?php

namespace Morebec\ValueObjects\Geography;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a City
 */
class City extends StringBasedValueObject
{
    public function __construct(string $city)
    {
        Assertion::notBlank($city);
        parent::__construct($city);
    }
}
