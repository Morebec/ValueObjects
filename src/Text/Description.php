<?php

namespace Morebec\ValueObjects\Text;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a description
 */
class Description extends StringBasedValueObject
{
    public function __construct(string $description)
    {
        parent::__construct($description);
    }

    /**
     * Indicates if the description contains a substring
     * @param  string $subString substring to find
     * @return bool            true if substring found, otherwise false
     */
    public function contains(string $subString): bool
    {
        return strpos($this->value, $subString) !== false;
    }
}