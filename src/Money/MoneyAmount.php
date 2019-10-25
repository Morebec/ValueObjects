<?php 

namespace Morebec\ValueObjects\Money;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * MoneyAmount
 */
class MoneyAmount implements ValueObjectInterface
{
    /** @var float */
    private $amount;

    /** @var Currency */
    private $currency;

    function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * Returns the amount of money
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Returns the currency of this amount of money
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * Returns the currency code of this value
     * @return CurrencyCode
     */
    public function getCurrencyCode(): CurrencyCode
    {
        return $this->currency->getCode();
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
        $amount = strval($this->amount);
        $currency = $this->currency;
        return "$amount $currency";
    }
}