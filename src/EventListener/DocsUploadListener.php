<?php

namespace App\EventListener;

use App\Entity\Souscripteur;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class DocsUploadListener
{
    /** @var FileUploader */
    private $uploader;

    /**
     * @param FileUploader $uploader
     */
    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * @param $entity
     */
    private function uploadFile($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Souscripteur) {
            return;
        }

        $cartRecto1File = $entity->getCartRecto1();
        $cartVerso1File = $entity->getCartVerso1();

        $cartRecto2File = $entity->getCartRecto2();
        $cartVerso2File = $entity->getCartVerso2();

        $compoMenageFile = $entity->getCompoMenage();
        $autreDocFile = $entity->getAutreDoc();

        // only upload new files
        if (($cartRecto1File instanceof UploadedFile) &&
        ($cartVerso1File instanceof UploadedFile) &&
        ($cartRecto2File instanceof UploadedFile) &&
        ($cartVerso2File instanceof UploadedFile) &&
        ($compoMenageFile instanceof UploadedFile) &&
        ($autreDocFile instanceof UploadedFile)) {
            $fileNameCartRecto1 = $this->uploader->upload($cartRecto1File);
            $fileNameCartVerso1 = $this->uploader->upload($cartVerso1File);

            $fileNameCartRecto2 = $this->uploader->upload($cartRecto2File);
            $fileNameCartVerso2 = $this->uploader->upload($cartVerso2File);

            $fileNameCompo = $this->uploader->upload($compoMenageFile);
            $fileNameAutre = $this->uploader->upload($autreDocFile);

            $entity->setCartRecto1($fileNameCartRecto1);
            $entity->setCartVerso1($fileNameCartVerso1);

            $entity->setCartRecto2($fileNameCartRecto2);
            $entity->setCartVerso2($fileNameCartVerso2);

            $entity->setCompoMenage($fileNameCompo);
            $entity->setAutreDoc($fileNameAutre);
        }
    }


    
}