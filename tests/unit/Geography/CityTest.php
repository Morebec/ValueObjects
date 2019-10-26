<?php 

use Morebec\ValueObjects\Geography\City;

/**
 * Tests for City value object
 */
class CityTest extends \Codeception\Test\Unit
{
    public function testEqualityWithValueObject()
    {
        $city = new City('my-city');

        $this->assertEquals($city, new City('my-city'));
        $this->assertTrue($city->isEqualTo(new City('my-city')));
    }

    public function testInequalityWithValueObject()
    {
        $city = new City('my-city');

        $this->assertNotEquals($city, new City('different-city'));
        $this->assertFalse($city->isEqualTo(new City('different-city')));
    }

    public function testEqualityWithString()
    {
        $city = new City('my-city');

        $this->assertEquals('my-city', $city);
    }

    public function testInequalityWithString()
    {
        $city = new City('my-city');
        $this->assertNotEquals('different', $city);
    }
}