<?php 

use Morebec\ValueObjects\Password\HashedPassword;

/**
 * Tests for hashed password value object class
 */
class HashedPasswordTest extends \Codeception\Test\Unit
{
    public function testEqualityWithPasswordObject()
    {
        $password = new HashedPassword('my-password');

        $this->assertEquals($password, new HashedPassword('my-password'));
        $this->assertTrue($password->isEqualTo(new HashedPassword('my-password')));
    }

    public function testInequalityWithPasswordObject()
    {
        $password = new HashedPassword('my-password');

        $this->assertNotEquals($password, new HashedPassword('different-password'));
        $this->assertFalse($password->isEqualTo(new HashedPassword('different-password')));
    }

    public function testEqualityWithString()
    {
        $password = new HashedPassword('my-password');

        $this->assertEquals('my-password', $password);
    }

    public function testInequalityWithString()
    {
        $password = new HashedPassword('my-password');
        $this->assertNotEquals('different', $password);
    }
}