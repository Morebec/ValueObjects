<?php 

use Morebec\ValueObjects\Geography\Country;
use Morebec\ValueObjects\Geography\CountryCode;

/**
 * CountryTest
 */
class CountryTest extends \Codeception\Test\Unit
{
    public function testInvalidCountryCodeThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $c = new Country(new CountryCode('WRONG_CODE'));
    }

    public function testInvalidCountryCodeStaticGenerationThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $c = Country::WRONG();
    }

    public function testValidCountryCode()
    {
        $c = new Country(new CountryCode(CountryCode::CA));
    }

    public function testValidCountryCodeStaticGeneration()
    {
        $c = Country::CA();
    }

    public function testEqualityWithString()
    {
        $c = Country::CA();
        $this->assertEquals('CA', $c);
    }

    public function testInequalityWithString()
    {
        $c = Country::CA();
        $this->assertNotEquals('US', $c);
    }

    public function testEqualityWithValueObject()
    {
        $ca1 = Country::CA();
        $ca2 = Country::CA();
        $this->assertTrue($ca1->isEqualTo($ca2));
    }

    public function testInequalityWithValueObject()
    {
        $ca = Country::CA();
        $us = Country::US();
        $this->assertFalse($ca->isEqualTo($us));
    }
}