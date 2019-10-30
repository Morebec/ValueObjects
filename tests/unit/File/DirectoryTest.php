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

        $this->assertTrue(count($files) != 0);
        foreach ($files as $file) {
            $this->assertTrue($file->exists());
        }
    }
}