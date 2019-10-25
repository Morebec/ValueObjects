<?php 

use Morebec\ValueObjects\Money\Currency;
use Morebec\ValueObjects\Money\MoneyAmount;

/**
 * MoneyAmountTest
 */
class MoneyAmountTest extends \Codeception\Test\Unit
{
    public function testInvalidCodeThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $amount = new MoneyAmount(500, Currency::WRONG());
    }

    public function testValidCode()
    {
        $amount = new MoneyAmount(500, Currency::USD());
    }

    public function testToString()
    {
        $amount = new MoneyAmount(500, Currency::USD());
        $this->assertEquals('500 USD', $amount->__toString());
    }

    public function testEqualityWithString()
    {
        $amount = new MoneyAmount(500, Currency::USD());
        $this->AssertEquals('500 USD', $amount);
    }

    public function testInequalityWithString()
    {
        $amount = new MoneyAmount(500, Currency::USD());
        $this->assertNotEquals('500 EUR', $amount);
    }
}