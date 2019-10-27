<?php 

namespace Morebec\ValueObjects\Geography;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Country
 */
class Country implements ValueObjectInterface
{
    /** @var CountryCode */
    private $code;

    function __construct(string $countryCode)
    {
        $this->code = new CountryCode($countryCode);
    }

    public function getCode(): CountryCode
    {
        return $this->code;
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
        return (string)$this->code;
    }

    /**
     * Used so it is poossible to do things like
     * Country::US()
     */
    public static function __callStatic($method, $arguments)
    {
        CountryCode::validateValue($method);
        return new Country(CountryCode::fromString($method));
    }
}