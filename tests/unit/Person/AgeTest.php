<?php 

use Morebec\ValueObjects\Person\Age;

/**
 * AgeTest
 */
class AgeTest extends \Codeception\Test\Unit
{

    public function testAgeZeroThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $age = new Age(0);
    }

    public function testNegativeAgeThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $age = new Age(-50);
    }

    public function testEqualityWithInt()
    {
        $age = new Age(35);
        $this->assertEquals(35, $age->toInt());
    }

    public function testInequalityWithInt()
    {
        $age = new Age(35);
        $this->assertNotEquals(60, $age->toInt());
    }

    public function testEqualityWithString()
    {
        $age = new Age(35);
        $this->assertEquals('35', $age);
    }

    public function testInqualityWithString()
    {
        $age = new Age(35);
        $this->assertNotEquals('50', $age);
    }    

    public function testEqualityWithValueObject()
    {
        $age = new Age(35);
        $this->assertEquals(new Age(35), $age);
    }

    public function testInqualityWithValueObject()
    {
        $age = new Age(35);
        $this->assertNotEquals(new Age(45), $age);
    }
}