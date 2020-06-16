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
