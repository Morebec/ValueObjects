<?php

use Codeception\Test\Unit;
use Morebec\ValueObjects\Money\Currency;
use Morebec\ValueObjects\Money\CurrencyCode;

/**
 * CurrencyTest
 */
class CurrencyTest extends Unit
{
    public function testValidCurrencyCode()
    {
        $c = new Currency(new CurrencyCode(CurrencyCode::CAD));
    }

    public function testValidCurrencyCodeStaticGeneration()
    {
        $c = Currency::CAD();
    }

    public function testEqualityWithString()
    {
        $c = Currency::CAD();
        $this->assertEquals('CAD', $c);
    }

    public function testInequalityWithString()
    {
        $c = Currency::CAD();
        $this->assertNotEquals('EUR', $c);
    }

    public function testEqualityWithValueObject()
    {
        $cad1 = Currency::CAD();
        $cad2 = Currency::CAD();
        $this->assertTrue($cad1->isEqualTo($cad2));
    }

    public function testInequalityWithValueObject()
    {
        $cad = Currency::CAD();
        $usd = Currency::USD();
        $this->assertFalse($cad->isEqualTo($usd));
    }
}