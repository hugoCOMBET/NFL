<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *  collectionOperations = {"get"},
 *  itemOperations = {"get"},
 *  )
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEntree;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="joueurs")
     */
    private $Pays;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class, inversedBy="joueurs")
     */
    private $Poste;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="joueurs")
     */
    private $Equipe;

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

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->Pays;
    }

    public function setPays(?Pays $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getPoste(): ?Poste
    {
        return $this->Poste;
    }

    public function setPoste(?Poste $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->Equipe;
    }

    public function setEquipe(?Equipe $Equipe): self
    {
        $this->Equipe = $Equipe;

        return $this;
    }

    public function dureeJoueur(): string
    {
        $dateEntree = $this->getDateEntree();
        $dateJour = new \DateTime('NOW');
        $NbJoursEcoules = date_diff($dateJour, $dateEntree);

        return $NbJoursEcoules->format('%a');;
    }
}
