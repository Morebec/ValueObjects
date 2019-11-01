<?php 

namespace Morebec\ValueObjects\File;

/**
 * Directory Value Object
 */
class Directory extends File
{
    /**
     * Returns the files contained in the directory
     * @return array
     */
    public function getFiles(): \Generator
    {
        $path = $this->getRealpath();
        $systemFiles = scandir($path);
        // remove '.' and '..'
        $systemFiles = array_diff(scandir($path), array('.', '..'));

        $files = [];

        foreach ($systemFiles as $file) {
            yield self::fromStringPath($path . '/' . $file);
        }
    }

    /**
     * Returns the number of files in the direcotry
     * @return int
     */
    public function getNbFiles(): int
    {
        $c = 0; 
        foreach ($this->getFiles() as $f) {
            $c++;
        }

        return $c;
    }
}