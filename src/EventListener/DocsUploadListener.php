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
    private function uploadFileCartRecto1($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Souscripteur) {
            return;
        }

        $cartRecto1File = $entity->getCartRecto1();

        // only upload new files
        if ($cartRecto1File instanceof UploadedFile) {
            $fileNameCartRecto1 = $this->uploader->upload($cartRecto1File);

            $entity->setCartRecto1($fileNameCartRecto1);
        }
    }

     /**
     * @param $entity
     */
    private function uploadFileCartVerso1($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Souscripteur) {
            return;
        }

        $cartVerso1File = $entity->getCartVerso1();

        // only upload new files
        if ($cartVerso1File instanceof UploadedFile) {
            $fileNameCartVerso1 = $this->uploader->upload($cartVerso1File);

            $entity->setCartVerso1($fileNameCartVerso1);
        }
    }

    /**
     * @param $entity
     */
    private function uploadFileCartRecto2($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Souscripteur) {
            return;
        }

        $cartRecto2File = $entity->getCartRecto2();

        // only upload new files
        if ($cartRecto2File instanceof UploadedFile) {
            $fileNameCartRecto2 = $this->uploader->upload($cartRecto2File);

            $entity->setCartRecto2($fileNameCartRecto2);
        }
    }

     /**
     * @param $entity
     */
    private function uploadFileCartVerso2($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Souscripteur) {
            return;
        }

        $cartVerso2File = $entity->getCartVerso2();

        // only upload new files
        if ($cartVerso2File instanceof UploadedFile) {
            $fileNameCartVerso2 = $this->uploader->upload($cartVerso2File);

            $entity->setCartVerso2($fileNameCartVerso2);
        }
    }

    /**
     * @param $entity
     */
    private function uploadFileCompoMenage($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Souscripteur) {
            return;
        }

        $compoMenageFile = $entity->getCompoMenage();

        // only upload new files
        if ($compoMenageFile instanceof UploadedFile) {
            $fileNameCompoMenage = $this->uploader->upload($compoMenageFile);

            $entity->setCompoMenage($fileNameCompoMenage);
        }
    }

    /**
     * @param $entity
     */
    private function uploadFileAutreDoc($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Souscripteur) {
            return;
        }

        $autreDocFile = $entity->getAutreDoc();

        // only upload new files
        if ($autreDocFile instanceof UploadedFile) {
            $fileNameAutreDoc = $this->uploader->upload($autreDocFile);

            $entity->setAutreDoc($fileNameAutreDoc);
        }
    }

    
}