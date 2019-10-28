<?php 

use Morebec\ValueObjects\DateTime\Time\Hour;
use Morebec\ValueObjects\DateTime\Time\Minute;
use Morebec\ValueObjects\DateTime\Time\Second;
use Morebec\ValueObjects\DateTime\Time\Time;

/**
 * TimeTest
 */
class TimeTest extends Codeception\Test\Unit
{
    public function testInvalidTimes()
    {
        $this->expectException(\InvalidArgumentException::class);

        $t = new Time(new Hour(24), new Minute(0), new Second(0));
        $t = new Time(new Hour(4), new Minute(99), new Second(0));
        $t = new Time(new Hour(4), new Minute(0), new Second(90));
    }

    public function testStringRepresentation(): void
    {
        $t = new Time(new Hour(12), new Minute(28), new Second(0));
        $this->assertEquals('12:28:00', $t);
    }

    public function testZero(): void
    {
        $t = Time::zero();

        $this->assertEquals("00:00:00", $t);
    }

    public function testMidnight(): void
    {
        $t = Time::midnight();

        $this->assertEquals("00:00:00", $t);
    }

    public function testEndOfDay(): void
    {
        $t = Time::endOfDay();

        $this->assertEquals("23:59:59", $t);
    }

    public function testEqualityWithString()
    {
        $t = new Time(new Hour(19), new Minute(35), new Second(10));
        $this->assertEquals("19:35:10", $t);
    }

    public function testEqualityWithValueObject()
    {
        $t = new Time(new Hour(19), new Minute(35), new Second(10));
        $this->assertEquals($t, new Time(new Hour(19), new Minute(35), new Second(10)));
    }

    public function testInequalityWithString()
    {
        $t = new Time(new Hour(19), new Minute(35), new Second(10));
        $this->assertNotEquals("18:06:54", $t);
    }

    public function testInequalityWithValueObject()
    {
        $t = new Time(new Hour(19), new Minute(35), new Second(10));
        $this->assertNotEquals($t, new Time(new Hour(14), new Minute(15), new Second(40)));
    }
}