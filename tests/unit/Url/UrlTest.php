<?php 

use Morebec\ValueObjects\Url\Url;

/**
 * UrlTest
 */
class UrlTest extends \Codeception\Test\Unit
{

    public function testValidUrlDoesNotThrowException(): void
    {
        $url = new Url('https://www.google.com');
    }

    public function testUserPassCombinationDetected(): void
    {
        $url = new Url('https://jamesbond:mi6007@google.com?q=search');

        $this->assertEquals('jamesbond', $url->getUsername());
        $this->assertEquals('mi6007', $url->getPassword());
    }

    public function testNoUserPassCombinationDetectedReturnsBlanks(): void
    {
        $url = new Url('https://google.com?q=search');

        $this->assertEquals('', $url->getUsername());
        $this->assertEquals('', $url->getPassword());
    }

    public function testPortNumberDetected(): void
    {
        $url = new Url('https://user:pass@google.com:8080?q=search');

        $this->assertEquals(8080, $url->getPortNumber()->toInt());
    }

    public function testEmptyPortNumberDetected(): void
    {
        $url = new Url('https://user:pass@google.com?q=search');

        $this->assertEquals(null, $url->getPortNumber());
    }

    public function testQueryStringDetected(): void
    {
        $url = new Url('https://user:pass@google.com:8080?q=search');

        $this->assertEquals('?q=search', $url->getQueryString());
    }

    public function testEmptyQueryStringDetected(): void
    {
        $url = new Url('https://user:pass@google.com:8080?');

        $this->assertEquals(null, $url->getQueryString());
    }

    public function testFragmentDetected(): void
    {
        $url = new Url('https://user:pass@google.com:8080?q=search#anchor');

        $this->assertEquals('#anchor', $url->getFragment());
    }

    public function testEmptyFragmentDetected(): void
    {
        $url = new Url('https://user:pass@google.com:8080?q=search');

        $this->assertEquals(null, $url->getFragment());
    }


    public function testHostnameDetected(): void
    {
        $url = new Url('https://user:pass@google.com:8080?q=search');

        $this->assertEquals('google.com', $url->getHostname());
    }

    public function testInvalidUrlThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $url = new Url('https://@google.com:8080?q=search');
    }
}