<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $designation;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Orders", inversedBy="fkproduct1")
     */
    private $fkproducts;

    public function __construct()
    {
        $this->fkproducts = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getFkproducts(): Collection
    {
        return $this->fkproducts;
    }

    public function addFkproduct(Orders $fkproduct): self
    {
        if (!$this->fkproducts->contains($fkproduct)) {
            $this->fkproducts[] = $fkproduct;
        }

        return $this;
    }

    public function removeFkproduct(Orders $fkproduct): self
    {
        if ($this->fkproducts->contains($fkproduct)) {
            $this->fkproducts->removeElement($fkproduct);
        }

        return $this;
    }
    
    /*public function __toString(){
        // to show the name of the Category in the select
        return $this->designation;
        // to show the id of the Category in the select
        // return $this->id;
    }*/
}
