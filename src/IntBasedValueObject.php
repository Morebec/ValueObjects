<?php

namespace Morebec\ValueObjects;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Class used to represent ValueObjects relying on a single int
 */
abstract class IntBasedValueObject implements ValueObjectInterface
{
    /** @var int */
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return strval($this->value);
    }

    public function toInt(): int
    {
        return $this->value;
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