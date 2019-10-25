<?php 

use Morebec\ValueObjects\Password\PlainTextPassword;

/**
 * Tests for password address value object class
 */
class PlainTextPasswordTest extends \Codeception\Test\Unit
{
    public function testNullPasswordThrowsException()
    {
        $this->expectException(\TypeError::class);
        $password = new PlainTextPassword(null);
    }

    public function testBlankPasswordThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $password = new PlainTextPassword('');
    }

    public function testPasswordTooLongThrowsExeption()
    {
        $str = '';
        for ($i=0; $i <= PlainTextPassword::MAX_LENGTH; $i++) { 
            $str = $str . 'A';
        }
        $this->expectException(\InvalidArgumentException::class);
        $password = new PlainTextPassword($str);
    }

    public function testPasswordTooShortThrowsExeption()
    {
        $this->expectException(\InvalidArgumentException::class);
        $password = new PlainTextPassword('AAA');
    }

    public function testEqualityWithPasswordObject()
    {
        $password = new PlainTextPassword('my-password');

        $this->assertEquals($password, new PlainTextPassword('my-password'));
        $this->assertTrue($password->isEqualTo(new PlainTextPassword('my-password')));
    }

    public function testInequalityWithPasswordObject()
    {
        $password = new PlainTextPassword('my-password');
        $this->assertNotEquals($password, new PlainTextPassword('wrong-password'));
        $this->assertFalse($password->isEqualTo(new PlainTextPassword('wrong-password')));
    }

    public function testEqualityWithString()
    {
        $password = new PlainTextPassword('my-password');

        $this->assertEquals('my-password', $password);
    }

    public function testInequalityWithString()
    {
        $password = new PlainTextPassword('my-password');

        $this->assertNotEquals('wrong-password', $password);
    }
}