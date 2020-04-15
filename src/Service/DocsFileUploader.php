<?php 

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DocsFileUploader
{
    
    private $targetDirectory;
    
     /**
     * @param string $targetDirectory
     */
    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @return string
     */
    public function getTargetDirectory(): string
    {
        return $this->targetDirectory;
    }



    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

        $file->move($this->targetDirectory, $fileName);

        return $fileName;
    }

 
}