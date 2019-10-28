<?php 

use Morebec\ValueObjects\DateTime\Time\Second;

/**
 * SecondTest
 */
class SecondTest extends Codeception\Test\Unit
{
    public function testNegativeNumberOfSecondsThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $s = new Second(-1);
    }

    public function testNthSecondTooHighThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $s = new Second(60);
    }
}