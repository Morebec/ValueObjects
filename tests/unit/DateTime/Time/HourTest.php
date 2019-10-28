<?php 

use Morebec\ValueObjects\DateTime\Time\Hour;

/**
 * HourTest
 */
class HourTest extends Codeception\Test\Unit
{
    public function testNegativeNumberOfHoursThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $h = new Hour(-1);
    }

    public function testNthHourTooHighThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $h = new Hour(60);
    }
}