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
}
