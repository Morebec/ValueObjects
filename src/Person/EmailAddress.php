<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Represents an Email Address
 */
final class EmailAddress implements ValueObjectInterface
{
    /** @var string */
    private $address;

    public function __construct(string $address)
    {
        Assertion::email($address);

        $this->address = strtolower($address);
    }

    public function getDomain(): string
    {
        return explode('@', $this->address)[1];
    }

    public function __toString()
    {
        return $this->address;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return ((string)$this) === ((string)$valueObject);
    }
}
