<?php 

use Morebec\ValueObjects\Money\Currency;
use Morebec\ValueObjects\Money\MoneyAmount;

/**
 * MoneyAmountTest
 */
class MoneyAmountTest extends \Codeception\Test\Unit
{
    public function testValidCode()
    {
        new MoneyAmount(500, Currency::USD());
    }

    public function testToString(): void
    {
        $amount = new MoneyAmount(500, Currency::USD());
        $this->assertEquals('500 USD', (string)$amount);
    }

    public function testEqualityWithString(): void
    {
        $amount = new MoneyAmount(500, Currency::USD());
        $this->assertEquals('500 USD', $amount);
    }

    public function testInequalityWithString(): void
    {
        $amount = new MoneyAmount(500, Currency::USD());
        $this->assertNotEquals('500 EUR', $amount);
    }

    public function testGreaterThanComparison(): void
    {
        $a1 = new MoneyAmount(150, Currency::USD());
        $a2 = new MoneyAmount(0, Currency::USD());

        $this->assertTrue($a1 > $a2);
    }

    public function testTwoMoneyAmountsCanBeAdded(): void
    {
        $a1 = new MoneyAmount(150, Currency::USD());
        $a2 = new MoneyAmount(150, Currency::USD());
        $sum = new MoneyAmount(300, Currency::USD());

        $this->assertEquals($sum, $a1->add($a2));
    }

    public function testTwoMoneyAmountAddedWithDifferentCurrenciesThrowsException(): void
    {
        $a1 = new MoneyAmount(150, Currency::USD());
        $a2 = new MoneyAmount(150, Currency::EUR());
        $this->expectException(\InvalidArgumentException::class);
        $a1->subtract($a2);
    }

    public function testTwoMoneyAmountsCanBeSubtracted(): void
    {
        $a1 = new MoneyAmount(150, Currency::USD());
        $a2 = new MoneyAmount(150, Currency::USD());
        $sum = new MoneyAmount(300, Currency::USD());

        $this->assertEquals($sum, $a1->add($a2));
    }

    public function testTwoMoneyAmountSubtractedWithDifferentCurrenciesThrowsException(): void
    {
        $a1 = new MoneyAmount(150, Currency::USD());
        $a2 = new MoneyAmount(150, Currency::EUR());
        $this->expectException(\InvalidArgumentException::class);
        $a1->subtract($a2);
    }

    public function testMultiplyBy(): void
    {
        $a1 = new MoneyAmount(150, Currency::USD());
        $result = new MoneyAmount(300, Currency::USD());

        $this->assertEquals($result, $a1->multiplyBy(2));
    }

    public function testDivideBy(): void
    {
        $a1 = new MoneyAmount(150, Currency::USD());
        $result = new MoneyAmount(15, Currency::USD());

        $this->assertEquals($result, $a1->divideBy(10));
    }

    public function test__callStatic()
    {
        $a = MoneyAmount::CAD(500);
        $a2 = new MoneyAmount(500, Currency::CAD());
        $this->assertTrue($a->isEqualTo($a2));
    }
}