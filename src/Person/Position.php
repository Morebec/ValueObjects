<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Position
 */
class Position extends StringBasedValueObject
{
    public function __construct(string $position)
    {
        Assertion::notBlank($position);
        parent::__construct($position);
    }
}
