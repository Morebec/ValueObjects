<?php

namespace Morebec\ValueObjects\Text;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a char
 */
class Char extends StringBasedValueObject
{
    public function __construct(string $char)
    {
        Assertion::length($char, 1);
        parent::__construct($char);
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
