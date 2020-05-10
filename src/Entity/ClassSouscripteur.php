<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClassSouscripteurRepository")
 */
class ClassSouscripteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_beneficiaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreBeneficiaire(): ?string
    {
        return $this->nombre_beneficiaire;
    }

    public function setNombreBeneficiaire(string $nombre_beneficiaire): self
    {
        $this->nombre_beneficiaire = $nombre_beneficiaire;

        return $this;
    }
}
