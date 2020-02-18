<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContratRepository")
 */
class Contrat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_enfants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_enfant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_enfant;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date
     * @var string A "Y-m-d" formatted value
     */
    private $date_naissance_enfant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien_affiliation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbreEnfants(): ?int
    {
        return $this->nbre_enfants;
    }

    public function setNbreEnfants(int $nbre_enfants): self
    {
        $this->nbre_enfants = $nbre_enfants;

        return $this;
    }

    public function getNomEnfant(): ?string
    {
        return $this->nom_enfant;
    }

    public function setNomEnfant(string $nom_enfant): self
    {
        $this->nom_enfant = $nom_enfant;

        return $this;
    }

    public function getPrenomEnfant(): ?string
    {
        return $this->prenom_enfant;
    }

    public function setPrenomEnfant(string $prenom_enfant): self
    {
        $this->prenom_enfant = $prenom_enfant;

        return $this;
    }

    public function getDateNaissanceEnfant(): ?\DateTimeInterface
    {
        return $this->date_naissance_enfant;
    }

    public function setDateNaissanceEnfant(\DateTimeInterface $date_naissance_enfant): self
    {
        $this->date_naissance_enfant = $date_naissance_enfant;

        return $this;
    }

    public function getLienAffiliation(): ?string
    {
        return $this->lien_affiliation;
    }

    public function setLienAffiliation(string $lien_affiliation): self
    {
        $this->lien_affiliation = $lien_affiliation;

        return $this;
    }
}
