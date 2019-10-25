<?php

namespace Morebec\ValueObjects\Password;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * PlainTextPassword
 */
final class PlainTextPassword implements ValueObjectInterface
{
    const MIN_LENGTH = 6;

    const MAX_LENGTH = 4096; // Security

    /** @var string plainTextPassword */
    private $plainTextPassword;

    public function __construct(string $plainTextPassword)
    {
        // Validate
        Assertion::betweenLength(
            $plainTextPassword,
            self::MIN_LENGTH,
            self::MAX_LENGTH
        );

        $this->plainTextPassword = $plainTextPassword;
    }

    public function __toString()
    {
        return $this->plainTextPassword;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return ((string)$this) == ((string)$valueObject);
    }
}
