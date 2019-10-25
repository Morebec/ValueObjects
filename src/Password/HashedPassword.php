<?php

namespace Morebec\ValueObjects\Password;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Hashed Password
 */
final class HashedPassword implements ValueObjectInterface
{
    /** @var string password */
    private $password;

    public function __construct(string $password)
    {
        // Validate
        Assertion::notBlank($password);

        $this->password = $password;
    }

    public function __toString()
    {
        return $this->password;
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
