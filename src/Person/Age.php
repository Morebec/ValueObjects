<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Age Value Object
 */
final class Age implements ValueObjectInterface
{
    /** @var int age */
    private $age;

    public function __construct(int $age)
    {
        Assertion::min($age, 1);
        $this->age = $age;
    }

    public function __toString()
    {
        return strval($this->age);
    }

    /**
     * Returns the value of this age object
     * @return int
     */
    public function toInt(): int
    {
        return $this->age;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $vo): bool
    {
        return (string)$this === (string)$vo;
    }
}
