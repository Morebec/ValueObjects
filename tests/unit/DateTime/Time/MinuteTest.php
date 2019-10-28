<?php 

use Morebec\ValueObjects\DateTime\Time\Minute;

/**
 * MinuteTest
 */
class MinuteTest extends Codeception\Test\Unit
{
    public function testNegativeNumberOfMinutesThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $t = new Minute(-1);
    }

    public function testNthMinuteTooHighThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $t = new Minute(60);
    }
}