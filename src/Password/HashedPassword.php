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
}
