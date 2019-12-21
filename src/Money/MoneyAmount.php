<?php

namespace Morebec\ValueObjects\Money;

use \InvalidArgumentException;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * MoneyAmount
 * @method static CAD(float $a): Currency
 * @method static USD(float $a): Currency
 * @method static EUR(float $a): Currency
 */
class MoneyAmount implements ValueObjectInterface
{
    /** @var float */
    private $amount;

    /** @var Currency */
    private $currency;

    public function __construct(float $amount, Currency $currency)
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
        $amount = (string)$this->amount;
        $currency = $this->currency;
        return "$amount $currency";
    }

    /**
     * Adds an amount of money with this amount
     * and returns a new MoneyAmount with the result
     * @param MoneyAmount $a2
     * @return MoneyAmount
     */
    public function add(MoneyAmount $a2): MoneyAmount
    {
        $this->ensureSameCurrencyAs($a2);
        return new static($this->amount + $a2->getAmount(), $this->currency);
    }

    /**
     * Subtract an amount of money from this amount
     * and returns a new MoneyAmount with the result
     * @param MoneyAmount $a2
     * @return MoneyAmount
     */
    public function subtract(MoneyAmount $a2): MoneyAmount
    {
        $this->ensureSameCurrencyAs($a2);
        return new static($this->amount - $a2->getAmount(), $this->currency);
    }

    /**
     * Multiples this amount of money with a number
     * and returns a new MoneyAmount with the result
     * @param float $v
     * @return MoneyAmount
     */
    public function multiplyBy(float $v): MoneyAmount
    {
        return new static($this->amount * $v, $this->currency);
    }

    /**
     * Multiples this amount of money with a number
     * and returns a new MoneyAmount with the result
     * @param float $v
     * @return MoneyAmount
     */
    public function divideBy(float $v): MoneyAmount
    {
        return new static($this->amount / $v, $this->currency);
    }

    /**
     * Returns the absolute version of this amount of money
     * @return MoneyAmount
     */
    public function absolute(): MoneyAmount
    {
        return new static(abs($this->amount), $this->currency);
    }

    /**
     * Indicates if this amount has the same currency as another amount
     * @param MoneyAmount $a
     * @return bool
     */
    public function isSameCurrency(MoneyAmount $a): bool
    {
        return $this->currency->isEqualTo($a->getCurrency());
    }

    /**
     * @return bool
     */
    public function isPositive(): bool
    {
        return $this->amount > 0;
    }

    /**
     * @return bool
     */
    public function isZero(): bool
    {
        return $this->amount === 0;
    }

    /**
     * @return bool
     */
    public function isNegative(): bool
    {
        return $this->amount < 0;
    }

    /**
     * Used so it is possible to do things like
     * MoneyAmount::CAD(500) using the currency code
     * @param $method
     * @param $arguments
     * @return
     */
    public static function __callStatic($method, $arguments)
    {
        return new static($arguments[0], Currency::fromString($method));
    }

    /**
     * @param MoneyAmount $a2
     */
    private function ensureSameCurrencyAs(MoneyAmount $a2): void
    {
        if (!$this->isSameCurrency($a2)) {
            throw new InvalidArgumentException("The two amounts  must have the same currency [{$this->currency} !== {$a2->getCurrency()}]");
        }
    }
}
