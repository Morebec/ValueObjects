<?php 

use Morebec\ValueObjects\Person\EmailAddress;

/**
 * Tests for Email address value object class
 */
class EmailAddressTest extends \Codeception\Test\Unit
{
    public function testNullEmailAddressThrowsException()
    {
        $this->expectException(\TypeError::class);
        $email = new EmailAddress(null);
    }

    public function testBlankEmailAddressThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $email = new EmailAddress('');
    }

    public function testInvalidEmailAddressThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $email = new EmailAddress('this_is_not_valid');
    }

    public function testValidEmailAddress()
    {
        $email = new EmailAddress('email@valid.com');
        $this->assertEquals('email@valid.com', $email);
    }

    public function testUppercaseEmailAddressIsLowercased()
    {
        $email = new EmailAddress('EMAIL@vAlid.com');

        $this->assertEquals('email@valid.com', $email);
    }

    public function testGetDomain()
    {
        $email = new EmailAddress('email@valid.com');

        $this->assertEquals('valid.com', $email->getDomain());
    }

    public function testEqualityWithString()
    {
        $email = new EmailAddress('user@domain.com');
        $this->assertEquals('user@domain.com', $email);

    }

    public function testInequalityWithString()
    {
        $email = new EmailAddress('user@domain.com');
        $this->assertNotEquals('other@domain.com', $email);
    }

    public function testEqualityWithValueObject()
    {
        $email = new EmailAddress('user@domain.com');
        $this->assertEquals($email, new EmailAddress('user@domain.com'));
        $this->assertTrue($email->isEqualTo(new EmailAddress('user@domain.com')));
    }

    public function testInequalityWithValueObject()
    {
        $email = new EmailAddress('user@domain.com');
        $this->assertNotEquals($email, new EmailAddress('other@domain.com'));
        $this->assertFalse($email->isEqualTo(new EmailAddress('other@domain.com')));
    }
}