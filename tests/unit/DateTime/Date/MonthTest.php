<?php 

use Morebec\ValueObjects\DateTime\Date\Month;

/**
 * MonthTest
 */
class MonthTest extends Codeception\Test\Unit
{
    public function testInvalidMonthNumberThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $m = new Month(0);
    }

    public function testFromString()
    {
        $m = Month::fromString('January');

        $this->assertEquals(Month::JANUARY, $m);
    }
    
    public function testNow()
    {
        $m = Month::now();

        $this->assertEquals(strtoupper(date('F')), $m);
    }

    public function testEqualityWithValueObject()
    {
        $m = Month::DECEMBER();

        $this->assertTrue($m->isEqualTo(Month::DECEMBER()));
    }

    public function testInequalityWithString()
    {
        $m = Month::DECEMBER();

        $this->assertNotEquals('February', $m);
    }

    public function testInequalityWithValueObject()
    {
        $m = Month::DECEMBER();

        $this->assertFalse($m->isEqualTo(Month::JUNE()));
    }     
}