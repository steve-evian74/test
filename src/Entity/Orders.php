<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
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
    private $customer;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Products", mappedBy="fkproducts")
     */
    private $fkproduct1;

    public function __construct()
    {
        $this->fkproduct1 = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getFkproduct1(): Collection
    {
        return $this->fkproduct1;
    }

    public function addFkproduct1(Products $fkproduct1): self
    {
        if (!$this->fkproduct1->contains($fkproduct1)) {
            $this->fkproduct1[] = $fkproduct1;
            $fkproduct1->addFkproduct($this);
        }

        return $this;
    }

    public function removeFkproduct1(Products $fkproduct1): self
    {
        if ($this->fkproduct1->contains($fkproduct1)) {
            $this->fkproduct1->removeElement($fkproduct1);
            $fkproduct1->removeFkproduct($this);
        }

        return $this;
    }
    
     public function __toString(){
        // to show the name of the Category in the select
        return $this->customer;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
