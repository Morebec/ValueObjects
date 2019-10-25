<?php

namespace Morebec\ValueObjects\Person;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Position
 */
class Position implements ValueObjectInterface
{
    private $position;

    public function __construct(string $position)
    {
        Assertion::notBlank($position);
        $this->position = $position;
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

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
    {
        return $this->position;
    }
}
