<?php

use Codeception\Test\Unit;
use Morebec\ValueObjects\Money\CurrencyCode;

/**
 * CurrencyCodeTest
 */
class CurrencyCodeTest extends Unit
{
    public function testConstructWithNonDefaultCode()
    {
        $c = new CurrencyCode('BTC');
        $this->assertEquals('BTC', $c);
    }
    public function testEqualityWithString()
    {
        CurrencyCode::EUR();
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