<?php 

use Morebec\ValueObjects\Money\CurrencyCode;

/**
 * CurrencyCodeTest
 */
class CurrencyCodeTest extends \Codeception\Test\Unit
{
    public function testEqualityWithString()
    {
        $c = new CurrencyCode(CurrencyCode::USD);
        $this->assertEquals('USD', $c);
    }

    public function testInequalityWithString()
    {
        $c = new CurrencyCode(CurrencyCode::USD);
        $this->assertEquals('USD', $c);
    }

    public function testEqualityWithValueObject()
    {
        $usd1 = new CurrencyCode(CurrencyCode::USD);
        $usd2 = new CurrencyCode(CurrencyCode::USD);
        $this->assertTrue($usd1->isEqualTo($usd2));
    }

    public function testInequalityWithValueObject()
    {
        $usd = new CurrencyCode(CurrencyCode::USD);
        $eur = new CurrencyCode(CurrencyCode::EUR);
        $this->assertFalse($usd->isEqualTo($eur));
    }
}