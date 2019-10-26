<?php 

use Morebec\ValueObjects\Geography\CountryCode;

/**
 * CountryCodeTest
 */
class CountryCodeTest extends Codeception\Test\Unit
{
    public function testEqualityWithString()
    {
        $c = new CountryCode(CountryCode::US);
        $this->assertEquals('US', $c);
    }

    public function testInequalityWithString()
    {
        $c = new CountryCode(CountryCode::US);
        $this->assertEquals('US', $c);
    }

    public function testEqualityWithValueObject()
    {
        $us1 = new CountryCode(CountryCode::US);
        $us2 = new CountryCode(CountryCode::US);
        $this->assertTrue($us1->isEqualTo($us2));
    }

    public function testInequalityWithValueObject()
    {
        $us = new CountryCode(CountryCode::US);
        $ca = new CountryCode(CountryCode::CA);
        $this->assertFalse($us->isEqualTo($ca));
    }    
}