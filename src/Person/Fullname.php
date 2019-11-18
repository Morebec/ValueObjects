<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Fullname
 */
final class Fullname implements ValueObjectInterface
{
    /** @var string */
    private $firstname;
    
    /** @var string */
    private $lastname;

    public function __construct(string $firstname, string $lastname)
    {
        if ($firstname !== '') {
            Assertion::minLength($firstname, 2);
        }

        if ($lastname !== '') {
            Assertion::minLength($lastname, 2);
        }

        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function __toString()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return (string)$this === (string)$valueObject;
    }
}
