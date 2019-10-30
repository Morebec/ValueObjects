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
    public function getFiles(): array
    {
        $path = $this->getRealpath();
        $systemFiles = scandir($path);
        // remove '.' and '..'
        $systemFiles = array_diff(scandir($path), array('.', '..'));

        $files = [];

        foreach ($systemFiles as $file) {
            # code...
            $files[] = self::fromStringPath($path . '/' . $file);
        }

        return $files;
    }
}