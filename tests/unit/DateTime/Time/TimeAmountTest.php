<?php 

use Morebec\ValueObjects\DateTime\Time\TimeAmount;
use Morebec\ValueObjects\DateTime\Time\TimeUnit;

/**
 * TimeAmountTest
 */
class TimeAmountTest extends Codeception\Test\Unit
{
    public function testUnitConversion()
    {
        $t = new TimeAmount(60, TimeUnit::SECOND());
        $this->assertTrue(
            $t->convertToUnit(TimeUnit::MINUTE())->isEqualTo(
                new TimeAmount(1, TimeUnit::MINUTE())
            )
        );

        $t = new TimeAmount(30, TimeUnit::SECOND());
        $this->assertTrue(
            $t->convertToUnit(TimeUnit::MINUTE())->isEqualTo(
                new TimeAmount(0.5, TimeUnit::MINUTE())
            )
        );
    }

    public function testEqualityWithString()
    {
        $t = new TimeAmount(1, TimeUnit::DAY());

        $this->assertEquals('1 DAY', $t);
        $this->assertNotEquals('1 Year', $t);
    }    

    public function testEqualityWithValueObject()
    {
        $t = new TimeAmount(1, TimeUnit::DAY());

        $this->assertTrue($t->isEqualTo(new TimeAmount(1, TimeUnit::DAY())));
        $this->assertFalse($t->isEqualTo(new TimeAmount(1, TimeUnit::YEAR())));
    }
}