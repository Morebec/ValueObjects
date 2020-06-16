<?php

namespace Morebec\ValueObjects\Text;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a Title
 */
class Title extends StringBasedValueObject
{
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
