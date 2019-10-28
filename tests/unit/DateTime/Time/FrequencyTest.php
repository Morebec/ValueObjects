<?php 

use Morebec\ValueObjects\DateTime\Time\Frequency;
use Morebec\ValueObjects\DateTime\Time\TimeAmount;
use Morebec\ValueObjects\DateTime\Time\TimeUnit;

/**
 * FrequencytTest
 */
class FrequencytTest extends Codeception\Test\Unit
{
    public function testFromStringNotation()
    {   
        // Once every two years and a half
        $f = Frequency::fromString("1 x 2.5 YEAR");

        $this->assertTrue(
            $f->isEqualTo(
                new Frequency(1, new TimeAmount(2.5, TimeUnit::YEAR()))
            )
        );
    }

    public function testEqualityWithString()
    {
            // Once every day
        $t = new Frequency(1, new TimeAmount(1, TimeUnit::DAY()));

        $this->assertEquals('1 x 1 DAY', $t);
    }    

    public function testEqualityWithValueObject()
    {
        $t = new Frequency(1, new TimeAmount(1, TimeUnit::DAY()));

        $this->assertTrue($t->isEqualTo(new Frequency(1, new TimeAmount(1, TimeUnit::DAY()))));
        $this->assertFalse($t->isEqualTo(new Frequency(1, new TimeAmount(1, TimeUnit::YEAR()))));
    }
}