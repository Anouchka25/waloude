<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConjointRepository")
 */
class Conjoint
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel_domicile;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Souscripteur", mappedBy="conjoint", cascade={"persist", "remove"})
     */
    private $souscripteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getPaysNaissance(): ?string
    {
        return $this->pays_naissance;
    }

    public function setPaysNaissance(string $pays_naissance): self
    {
        $this->pays_naissance = $pays_naissance;

        return $this;
    }

/*     public function getVilleNaissance(): ?string
    {
        return $this->ville_naissance;
    }

    public function setVilleNaissance(string $ville_naissance): self
    {
        $this->ville_naissance = $ville_naissance;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    } */

    /* public function getMemeAdresse(): ?string
    {
        return $this->meme_adresse;
    }

    public function setMemeAdresse(string $meme_adresse): self
    {
        $this->meme_adresse = $meme_adresse;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    } */

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getTelDomicile(): ?string
    {
        return $this->tel_domicile;
    }

    public function setTelDomicile(?string $tel_domicile): self
    {
        $this->tel_domicile = $tel_domicile;

        return $this;
    }

   /*  public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
 */
    public function getSouscripteur(): ?Souscripteur
    {
        return $this->souscripteur;
    }

    public function setSouscripteur(?Souscripteur $souscripteur): self
    {
        $this->souscripteur = $souscripteur;

        // set (or unset) the owning side of the relation if necessary
        $newConjoint = null === $souscripteur ? null : $this;
        if ($souscripteur->getConjoint() !== $newConjoint) {
            $souscripteur->setConjoint($newConjoint);
        }

        return $this;
    }
}
