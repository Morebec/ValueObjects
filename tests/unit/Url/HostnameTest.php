<?php 

use Morebec\ValueObjects\Url\Hostname;

/**
 * Host name test
 */
class HostnameTest extends \Codeception\Test\Unit
{
    public function testBlankHostnameThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $hostname = new Hostname('');
    }

    public function testInvalidHostnameThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $hostname = new Hostname('this.is.invalid.__');
    }

    public function testValidHostnameDoesNotThrowException()
    {
        $hostname = new Hostname('valid.hostname.com');
    }

    public function testEqulityWithString()
    {
        $hostname = new Hostname('hostname.tld');
        $this->assertEquals('hostname.tld', $hostname);
    }

    public function testEqulityWithValueObject()
    {
        $this->assertEquals(new Hostname('hostname.tld'), new Hostname('hostname.tld'));
    }
}