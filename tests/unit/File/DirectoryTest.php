<?php

use Morebec\ValueObjects\File\Directory;
use Morebec\ValueObjects\File\Path;

/**
 * DirectoryTest
 */
class DirectoryTest extends \Codeception\Test\Unit
{
    public function testGetFiles()
    {
        $d = new Directory(new Path(__DIR__));

        $files = $d->getFiles();

        $count = 0;
        foreach ($files as $file) {
            $count++;
            $this->assertTrue($file->exists());
        }

        $this->assertNotEquals(0, $count);
    }
}