<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SouscripteurRepository")
 */
class Souscripteur
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
    private $civilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_jeune_fille;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays_naissance;

    /* /**
     * @ORM\Column(type="string", length=255)
     
    private $ville_naissance;
 */
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays_residence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville_residence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profession;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel_domicile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $situation_familiale;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_enfants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enfant", mappedBy="souscripteur")
     */
    private $enfants;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Conjoint", inversedBy="souscripteur", cascade={"persist", "remove"})
     */
    private $conjoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cartRecto1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cartVerso1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cartRecto2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cartVerso2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $compoMenage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autreDoc;

    /**
     * @ORM\Column(type="string")
     */
    private $reference;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Beneficiaire", mappedBy="souscripteur")
     */
    private $beneficiaires;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_beneficiaires;





    public function __construct()
    {
        $this->enfants = new ArrayCollection();
        $this->beneficiaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
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

    public function getNomJeuneFille(): ?string
    {
        return $this->nom_jeune_fille;
    }

    public function setNomJeuneFille(string $nom_jeune_fille): self
    {
        $this->nom_jeune_fille = $nom_jeune_fille;

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

    /* public function getVilleNaissance(): ?string
    {
        return $this->ville_naissance;
    }

    public function setVilleNaissance(string $ville_naissance): self
    {
        $this->ville_naissance = $ville_naissance;

        return $this;
    } */

    public function getPaysResidence(): ?string
    {
        return $this->pays_residence;
    }

    public function setPaysResidence(string $pays_residence): self
    {
        $this->pays_residence = $pays_residence;

        return $this;
    }

    public function getVilleResidence(): ?string
    {
        return $this->ville_residence;
    }

    public function setVilleResidence(string $ville_residence): self
    {
        $this->ville_residence = $ville_residence;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

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
    }

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

    public function getSituationFamiliale(): ?string
    {
        return $this->situation_familiale;
    }

    public function setSituationFamiliale(string $situation_familiale): self
    {
        $this->situation_familiale = $situation_familiale;

        return $this;
    }

    public function getNombreEnfants(): ?int
    {
        return $this->nombre_enfants;
    }

    public function setNombreEnfants(int $nombre_enfants): self
    {
        $this->nombre_enfants = $nombre_enfants;

        return $this;
    }

    /**
     * @return Collection|Enfant[]
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Enfant $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants[] = $enfant;
            $enfant->setSouscripteur($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): self
    {
        if ($this->enfants->contains($enfant)) {
            $this->enfants->removeElement($enfant);
            // set the owning side to null (unless already changed)
            if ($enfant->getSouscripteur() === $this) {
                $enfant->setSouscripteur(null);
            }
        }

        return $this;
    }

    public function getConjoint(): ?Conjoint
    {
        return $this->conjoint;
    }

    public function setConjoint(?Conjoint $conjoint): self
    {
        $this->conjoint = $conjoint;

        return $this;
    }

    public function getCartRecto1(): ?string
    {
        return $this->cartRecto1;
    }

    public function setCartRecto1(string $cartRecto1): self
    {
        $this->cartRecto1 = $cartRecto1;

        return $this;
    }

    public function getCartVerso1(): ?string
    {
        return $this->cartVerso1;
    }

    public function setCartVerso1(string $cartVerso1): self
    {
        $this->cartVerso1 = $cartVerso1;

        return $this;
    }

    public function getCartRecto2(): ?string
    {
        return $this->cartRecto2;
    }

    public function setCartRecto2(?string $cartRecto2): self
    {
        $this->cartRecto2 = $cartRecto2;

        return $this;
    }

    public function getCartVerso2(): ?string
    {
        return $this->cartVerso2;
    }

    public function setCartVerso2(?string $cartVerso2): self
    {
        $this->cartVerso2 = $cartVerso2;

        return $this;
    }

    public function getCompoMenage(): ?string
    {
        return $this->compoMenage;
    }

    public function setCompoMenage(string $compoMenage): self
    {
        $this->compoMenage = $compoMenage;

        return $this;
    }

    public function getAutreDoc(): ?string
    {
        return $this->autreDoc;
    }

    public function setAutreDoc(?string $autreDoc): self
    {
        $this->autreDoc = $autreDoc;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Collection|Beneficiaire[]
     */
    public function getBeneficiaires(): Collection
    {
        return $this->beneficiaires;
    }

    public function addBeneficiaire(Beneficiaire $beneficiaire): self
    {
        if (!$this->beneficiaires->contains($beneficiaire)) {
            $this->beneficiaires[] = $beneficiaire;
            $beneficiaire->setSouscripteur($this);
        }

        return $this;
    }

    public function removeBeneficiaire(Beneficiaire $beneficiaire): self
    {
        if ($this->beneficiaires->contains($beneficiaire)) {
            $this->beneficiaires->removeElement($beneficiaire);
            // set the owning side to null (unless already changed)
            if ($beneficiaire->getSouscripteur() === $this) {
                $beneficiaire->setSouscripteur(null);
            }
        }

        return $this;
    }

    public function getNombreBeneficiaires(): ?string
    {
        return $this->nombre_beneficiaires;
    }

    public function setNombreBeneficiaires(string $nombre_beneficiaires): self
    {
        $this->nombre_beneficiaires = $nombre_beneficiaires;

        return $this;
    }

    
}
