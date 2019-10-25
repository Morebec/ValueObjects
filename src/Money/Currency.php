<?php 

namespace Morebec\ValueObjects\Money;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Currency
 */
class Currency implements ValueObjectInterface
{
    /** @var CurrencyCode */
    private $code;

    function __construct(CurrencyCode $code)
    {
        $this->code = $code;
    }

    public function getCode(): CurrencyCode
    {
        return $this->code;
    }

    /**
     * Used so it is poossible to do things like
     * Currency::CAD()
     */
    public static function __callStatic($method, $arguments)
    {
        CurrencyCode::validateValue($method);
        return new Currency(CurrencyCode::fromString($method));
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
}