<?php 

namespace Morebec\ValueObjects\Person;

use Morebec\ValueObjects\Person\PhoneNumber;

/**
 * PhoneNumber
 */
class PhoneNumberTest extends \Codeception\Test\Unit
{
    public function testNullPhoneNumberThrowsException()
    {
        $this->expectException(\TypeError::class);
        $email = new PhoneNumber(null);
    }

    public function testBlankPhoneNumberThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $email = new PhoneNumber('');
    }

    public function testEqualityWithString()
    {
        $name = new PhoneNumber('555-555-5555');
        $this->assertEquals($name, '555-555-5555');
    }

    public function testInequalityWithString()
    {
        $name = new PhoneNumber('555-555-5555');
        $this->assertNotEquals($name, '777-777-7777');
    }

    public function testEqualityWithValueObject()
    {
        $name = new PhoneNumber('555-555-5555');
        $this->assertEquals($name, new PhoneNumber('555-555-5555'));
        $this->assertTrue($name->isEqualTo(new PhoneNumber('555-555-5555')));
    }

    public function testInequalityWithValueObject()
    {
        $name = new PhoneNumber('555-555-5555');
        $this->assertNotEquals($name, new PhoneNumber('777-777-7777'));
        $this->assertFalse($name->isEqualTo(new PhoneNumber('777-777-7777')));
    }
}