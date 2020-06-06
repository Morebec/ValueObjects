<?php

namespace Morebec\ValueObjects\Money;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Currency
 * @method static CAD(): Currency
 * @method static USD(): Currency
 * @method static EUR(): Currency
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
     * Used so it is possible to do things like
     * Currency::CAD() using the currency code
     * @param $method
     * @param $arguments
     * @return Currency
     */
    public static function __callStatic($method, $arguments)
    {
        return static::fromString($method);
    }

    public static function fromString(string $value): Currency
    {
        return new static(CurrencyCode::fromString($value));
    }

    /**
     * Indicates if this value object is equal to another value object
     * @param  ValueObjectInterface $valueObject other value object to compare to
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
