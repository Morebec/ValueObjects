<?php 

use Morebec\ValueObjects\DateTime\Date\WeekDay;

/**
 * WeekDayTest
 */
class WeekDayTest extends Codeception\Test\Unit
{
    public function testInvalidWeekDayNumberThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $m = new WeekDay(0);
    }

    public function testFromString()
    {
        $m = WeekDay::fromString('Monday');

        $this->assertEquals(WeekDay::MONDAY, $m);
    }
    
    public function testNow()
    {
        $m = WeekDay::now();

        $this->assertEquals(strtoupper(date('l')), $m);
    }

    public function testEqualityWithValueObject()
    {
        $m = WeekDay::FRIDAY();

        $this->assertTrue($m->isEqualTo(WeekDay::FRIDAY()));
    }

    public function testInequalityWithString()
    {
        $m = WeekDay::FRIDAY();

        $this->assertNotEquals('Saturday', $m);
    }

    public function testInequalityWithValueObject()
    {
        $m = WeekDay::FRIDAY();

        $this->assertFalse($m->isEqualTo(WeekDay::SUNDAY()));
    }     
}