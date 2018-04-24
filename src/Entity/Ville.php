<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 * @ApiResource(attributes={"filters"={"ville.search"}})
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codepostal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Departement", inversedBy="villes")
     * @ApiSubresource
     */
    private $fk_depart;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Meteo", mappedBy="fk_meteo")
     * @ApiSubresource
     */
    private $meteos;

    public function __construct()
    {
        $this->meteos = new ArrayCollection();
    }

    

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(?int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getFkDepart(): ?Departement
    {
        return $this->fk_depart;
    }

    public function setFkDepart(?Departement $fk_depart): self
    {
        $this->fk_depart = $fk_depart;

        return $this;
    }

    /**
     * @return Collection|Meteo[]
     */
    public function getMeteos(): Collection
    {
        return $this->meteos;
    }

    public function addMeteo(Meteo $meteo): self
    {
        if (!$this->meteos->contains($meteo)) {
            $this->meteos[] = $meteo;
            $meteo->setFkMeteo($this);
        }

        return $this;
    }

    public function removeMeteo(Meteo $meteo): self
    {
        if ($this->meteos->contains($meteo)) {
            $this->meteos->removeElement($meteo);
            // set the owning side to null (unless already changed)
            if ($meteo->getFkMeteo() === $this) {
                $meteo->setFkMeteo(null);
            }
        }

        return $this;
    }

    
    
}
