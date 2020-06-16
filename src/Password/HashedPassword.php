<?php

namespace Morebec\ValueObjects\Password;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Hashed Password
 */
final class HashedPassword extends StringBasedValueObject
{
    public function __construct(string $password)
    {
        // Validate
        Assertion::notBlank($password);

        parent::__construct($password);
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
