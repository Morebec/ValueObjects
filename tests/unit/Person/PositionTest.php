<?php 

namespace Morebec\ValueObjects\Person;

use Morebec\ValueObjects\Person\Position;

/**
 * Position
 */
class PositionTest extends \Codeception\Test\Unit
{
    public function testNullPositionThrowsException()
    {
        $this->expectException(\TypeError::class);
        $email = new Position(null);
    }

    public function testBlankPositionThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $email = new Position('');
    }

    public function testEqualityWithString()
    {
        $name = new Position('Developer');
        $this->assertEquals($name, 'Developer');
    }

    public function testInequalityWithString()
    {
        $name = new Position('Developer');
        $this->assertNotEquals($name, 'Accountant');
    }

    public function testEqualityWithValueObject()
    {
        $name = new Position('Developer');
        $this->assertEquals($name, new Position('Developer'));
        $this->assertTrue($name->isEqualTo(new Position('Developer')));
    }

    public function testInequalityWithValueObject()
    {
        $name = new Position('Developer');
        $this->assertNotEquals($name, new Position('Accountant'));
        $this->assertFalse($name->isEqualTo(new Position('Accountant')));
    }
}