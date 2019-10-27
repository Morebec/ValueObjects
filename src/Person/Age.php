<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Age Value Object
 */
final class Age extends IntBasedValueObject
{
    public function __construct(int $age)
    {
        Assertion::min($age, 1);
        parent::__construct($age);
    }
}
