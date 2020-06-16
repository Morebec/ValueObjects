<?php

namespace Morebec\ValueObjects;

/**
 * Class used to represent ValueObjects relying on a single string literal
 */
abstract class StringBasedValueObject implements ValueObjectInterface
{
    /** @var string */
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
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
