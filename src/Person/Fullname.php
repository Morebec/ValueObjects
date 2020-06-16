<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Fullname
 */
final class Fullname extends StringBasedValueObject
{
    public function __construct(string $fullname)
    {
        if ($fullname !== '') {
            Assertion::minLength($fullname, 2);
        }

        parent::__construct($fullname);
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
