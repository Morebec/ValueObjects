<?php

namespace Morebec\ValueObjects\Password;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * PlainTextPassword
 */
final class PlainTextPassword extends StringBasedValueObject
{
    public const MIN_LENGTH = 6;

    public const MAX_LENGTH = 4096; // Security

    public function __construct(string $plainTextPassword)
    {
        // Validate
        Assertion::betweenLength(
            $plainTextPassword,
            self::MIN_LENGTH,
            self::MAX_LENGTH
        );

        parent::__construct($plainTextPassword);
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
