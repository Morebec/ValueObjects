<?php

use Morebec\ValueObjects\Graphics\Color;

/**
 * Tests for Color value object
 */
class ColorTest extends \Codeception\Test\Unit
{
    public function testEqualityWithValueObject()
    {
        $color = new Color(255, 255, 255);

        $this->assertEquals($color, new Color(255, 255, 255));
        $this->assertTrue($color->isEqualTo(new Color(255, 255, 255)));
    }

    public function testInequalityWithValueObject()
    {
        $color = new Color(255, 255, 54);

        $this->assertNotEquals($color, new Color(255, 255, 255));
        $this->assertFalse($color->isEqualTo(new Color(255, 255, 255)));
    }

    public function testEqualityWithString()
    {
        $color = new Color(255, 255, 255);

        $this->assertEquals('#FFFFFFFF', (string)$color);
    }

    public function testInequalityWithString()
    {
        $color = new Color(255, 255, 255);
        $this->assertNotEquals('FFAABD', $color);
    }

    public function testToHex()
    {
        $color = new Color(255, 255, 255);
        $this->assertEquals('#FFFFFFFF', $color->toHex());
    }

    public function testFromHex()
    {
        // Test with 6 chars
        $color = Color::fromHex('#FFFFFF');
        $this->assertEquals(new Color(255, 255, 255), $color);

        // Test with 8 chars
        $color = Color::fromHex('#FFFFFFFF');
        $this->assertEquals(new Color(255, 255, 255, 255), $color);
    }
}
