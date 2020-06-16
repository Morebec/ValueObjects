<?php

namespace Morebec\ValueObjects;

use Morebec\ValueObjects\ValueObjectInterface;

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
     * Constructs an instance of this value object from a string value
     * @param string $value
     * @return static
     */
    public static function fromString(string $value): self
    {
        return new static($value);
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
