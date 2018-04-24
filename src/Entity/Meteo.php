<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MeteoRepository")
 * @ApiResource
 */
class Meteo
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
    private $temps;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $degres;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="meteos")
     * @ApiSubresource
     */
    private $fk_meteo;

    public function getId()
    {
        return $this->id;
    }

    public function getTemps(): ?string
    {
        return $this->temps;
    }

    public function setTemps(?string $temps): self
    {
        $this->temps = $temps;

        return $this;
    }

    public function getDegres(): ?float
    {
        return $this->degres;
    }

    public function setDegres(?float $degres): self
    {
        $this->degres = $degres;

        return $this;
    }

    public function getFkMeteo(): ?Ville
    {
        return $this->fk_meteo;
    }

    public function setFkMeteo(?Ville $fk_meteo): self
    {
        $this->fk_meteo = $fk_meteo;

        return $this;
    }
}
