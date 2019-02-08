<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Property", mappedBy="propertyname")
     */
    private $namecategorie;

    public function __construct()
    {
        $this->namecategorie = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }




    public function __toString() {
        return $this->name;
    }

    /**
     * @return Collection|Property[]
     */
    public function getNamecategorie(): Collection
    {
        return $this->namecategorie;
    }

    public function addNamecategorie(Property $namecategorie): self
    {
        if (!$this->namecategorie->contains($namecategorie)) {
            $this->namecategorie[] = $namecategorie;
            $namecategorie->setPropertyname($this);
        }

        return $this;
    }

    public function removeNamecategorie(Property $namecategorie): self
    {
        if ($this->namecategorie->contains($namecategorie)) {
            $this->namecategorie->removeElement($namecategorie);
            // set the owning side to null (unless already changed)
            if ($namecategorie->getPropertyname() === $this) {
                $namecategorie->setPropertyname(null);
            }
        }

        return $this;
    }
}
