<?php 

use Morebec\ValueObjects\DateTime\Date\Year;

/**
 * YearTest
 */
class YearTest extends Codeception\Test\Unit
{
    public function testYearZeroThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $y = new Year(0);
    }

    public function testLeapYear()
    {
        $y = new Year(2012);
        $this->assertTrue($y->isLeapYear());

        $y = new Year(2019);
        $this->assertFalse($y->isLeapYear());
    }

    public function testIsAfterDeath()
    {
        $y = new Year(2012);
        $this->assertTrue($y->isAfterDeath());

        $y = new Year(-42);
        $this->assertFalse($y->isAfterDeath());
    }

    public function testIsBeforeChrist()
    {
        $y = new Year(2012);
        $this->assertFalse($y->isBeforeChrist());

        $y = new Year(-42);
        $this->assertTrue($y->isBeforeChrist());
    }

    public function testFromString()
    {
        $y = Year::fromString('1935');

        $this->assertEquals(1935, $y->toInt());
    }
    
    public function testNow()
    {
        $y = Year::now();

        $this->assertEquals(date('Y'), $y->toInt());
    }

    public function testEqualityWithString()
    {
        $y = new Year(1926);

        $this->assertEquals('1926', $y);
    }

    public function testEqualityWithValueObject()
    {
        $y = new Year(1926);

        $this->assertTrue($y->isEqualTo(new Year(1926)));
    }

    public function testInequalityWithString()
    {
        $y = new Year(1926);

        $this->assertNotEquals('1949', $y);
    }

    public function testInequalityWithValueObject()
    {
        $y = new Year(1926);

        $this->assertFalse($y->isEqualTo(new Year(1925)));
    }     
}