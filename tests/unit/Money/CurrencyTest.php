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

    public function testValidCurrencyCodeStaticGeneration(): void
    {
        $c = Currency::CAD();
    }

    public function testEqualityWithString(): void
    {
        $c = Currency::CAD();
        $this->assertEquals('CAD', $c);
    }

    public function testInequalityWithString(): void
    {
        $c = Currency::CAD();
        $this->assertNotEquals('EUR', $c);
    }

    public function testEqualityWithValueObject(): void
    {
        $cad1 = Currency::CAD();
        $cad2 = Currency::CAD();
        $this->assertTrue($cad1->isEqualTo($cad2));
    }

    public function testInequalityWithValueObject(): void
    {
        $cad = Currency::CAD();
        $usd = Currency::USD();
        $this->assertFalse($cad->isEqualTo($usd));
    }

    public function testFromString(): void
    {
        $c = Currency::fromString('CAD');
        $cad = Currency::CAD();
        $this->assertTrue($c->isEqualTo($cad));
    }

    public function testFromStringWithWrongCodeThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $c = Currency::fromString('WRONG_CODE');
        $cad = Currency::CAD();
    }
}