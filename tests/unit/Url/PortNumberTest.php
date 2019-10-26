<?php 

use Morebec\ValueObjects\Url\PortNumber;

/**
 * Port number test
 */
class PortNumberTest extends \Codeception\Test\Unit
{

    public function testPortNumberTooLowThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $portNumber = new PortNumber(PortNumber::MIN_PORT_NUMBER - 1);
    }

    public function testPortNumberTooHighThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $portNumber = new PortNumber(PortNumber::MAX_PORT_NUMBER + 1);
    }

    public function testInvalidTypePortNumberThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $portNumber = new PortNumber(PortNumber::MIN_PORT_NUMBER - 1);
    }

    public function testPortNumberToIntegerReturnsRightValue(): void
    {
        $portNumber = new PortNumber(5);
        $this->assertEquals(5, $portNumber->toInteger());
    }

    public function testEqulityWithString(): void
    {
        $portNumber = new PortNumber(5);
        $this->assertEquals('5', $portNumber);
    }

    public function testInequlityWithString(): void
    {
        $portNumber = new PortNumber(5);
        $this->assertNotEquals('57', $portNumber);
    }

    public function testEqulityWithValueObject(): void
    {
        $portNumber = new PortNumber(5);
        $this->assertEquals($portNumber, new PortNumber(5));
    }

    public function testInequlityWithValueObject(): void
    {
        $portNumber = new PortNumber(5);
        $this->assertNotEquals($portNumber, new PortNumber(59));
    }
}