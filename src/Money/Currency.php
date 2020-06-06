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

    public function __construct(CurrencyCode $code)
    {
        $this->code = $code;
    }

    public function getCode(): CurrencyCode
    {
        return $this->code;
    }

    public static function withCode(string $code)
    {
        return new self(new CurrencyCode($code));
    }

    /**
     * Used so it is poossible to do things like
     * Currency::CAD() using the currency code
     */
    public static function __callStatic($method, $arguments)
    {
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
