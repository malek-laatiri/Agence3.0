<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PicsRepository")
 * @Vich\Uploadable
 */
class Pics
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Property", inversedBy="imageFile")
     * @var File
     * @Vich\UploadableField(mapping="property_image", fileNameProperty="image")
     */
    private $imagefile;

    /**
     * @param File $imagefile
     */
    public function setImagefile(File $imagefile): void
    {
        $this->imagefile = $imagefile;
    }

    /**
     * @return File
     */
    public function getImagefile(): File
    {
        return $this->imagefile;
    }



    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updateAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }




    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function __toString() { //tres important de la mettre(capture bureau)
        return (string)$this->imagefile;
    }

    public function __construct()
    {
        return $this->imagefile=new ArrayCollection();
    }


    public function setImage(ArrayCollection $Imagefile)
    {
        $this->imagefile[] = $Imagefile;
        for ($i = 0; $i < $Imagefile->count(); $i++) {
            $Imagefile->get($i)->setImageFile($this);
        }
        return $this;
    }

    public function addImage(Property $image)
    {
        $this->imagefile[] = $image;
        $image->setImageFile($this);
        return $this;
    }

    public function removeImage(Property $image)
    {
        if ($this->imagefile->contains($image)) {
            $this->imagefile->removeElement($image);
        }

        return $this;
    }
}
