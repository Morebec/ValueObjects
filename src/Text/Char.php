<?php 

namespace Morebec\ValueObjects\Text;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a char
 */
class Char extends StringBasedValueObject
{
    function __construct(string $char)
    {
        Assertion::length($char, 1);
        parent::__construct($char);
    }
}

