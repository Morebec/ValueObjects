<?php

namespace Morebec\ValueObjects\Text;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a description
 */
class Description extends StringBasedValueObject
{
    /**
     * Indicates if the description contains a substring
     * @param  string $subString substring to find
     * @return bool            true if substring found, otherwise false
     */
    public function contains(string $subString): bool
    {
        return strpos($this->value, $subString) !== false;
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
