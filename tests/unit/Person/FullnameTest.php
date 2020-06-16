<?php 

use Morebec\ValueObjects\Person\Fullname;

/**
 * Fullname
 */
class FullnameTest extends \Codeception\Test\Unit
{
    public function testEqualityWithString()
    {
        $name = new Fullname('James Bond');
        $this->assertEquals($name, 'James Bond');
    }

    public function testInequalityWithString()
    {
        $name = new Fullname('James Bond');
        $this->assertNotEquals($name, 'Bruce Wayne');
    }

    public function testEqualityWithValueObject()
    {
        $name = new Fullname('James Bond');
        $this->assertEquals($name, new Fullname('James Bond'));
        $this->assertTrue($name->isEqualTo(new Fullname('James Bond')));
    }

    public function testInequalityWithValueObject()
    {
        $name = new Fullname('James Bond');
        $this->assertNotEquals($name, new Fullname('Bruce Wayne'));
        $this->assertFalse($name->isEqualTo(new Fullname('Bruce Wayne')));
    }
}
