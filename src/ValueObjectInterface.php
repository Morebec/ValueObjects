<?php

namespace Morebec\ValueObjects;

/**
 * ValueObjectInterface
 */
interface ValueObjectInterface
{
    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool;

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString();
}
