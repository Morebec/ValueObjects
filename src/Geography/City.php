<?php  

namespace Morebec\ValueObjects\Geography;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Represents a City
 */
class City implements ValueObjectInterface
{
    /** @var city string */
    private $city;

    function __construct(string $city)
    {
        $this->city = $city;
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
        return $this->city;
    }
}
