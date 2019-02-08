<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Mapping\Annotation as Vich  ;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Hashids\Hashids;
use Symfony\Component\Form\Form;


/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Property
{
    const HEAT=[
        'electrique'=>'electrique',
        'gaz'=>'gaz'
    ];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */




    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Property",mappedBy="imagefile")
     * @var File
     */
    private $imageFile;




    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }




    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;



    /**
     * @ORM\Column(type="integer")
     */
    private $bedroom;

    /**
     * @ORM\Column(type="integer")
     */
    private $floor;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postal_code;


    /**
     * @ORM\Column(type="boolean")
     */
    private $sold=false;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hashid;
    /**
     * @ORM\Column(type="boolean")
     */
    private $allowed;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createdby;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rooms", inversedBy="properties",cascade={"persist"})
     * @ORM\JoinColumn(name="rooms_id", referencedColumnName="id")
     */
    private $rooms;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Choix", inversedBy="properties",cascade={"persist"})
     * @ORM\JoinColumn(name="choix_id", referencedColumnName="id")
     */
    private $choix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Heat", inversedBy="properties",cascade={"persist"})
     * @ORM\JoinColumn(name="heat_id", referencedColumnName="id")
     */
    private $heat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipement", inversedBy="properties",cascade={"persist"})
     * @ORM\JoinColumn(name="equipement_id", referencedColumnName="id")
     */
    private $equipement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="namecategorie",cascade={"persist"})
     */
    private $propertyname;



    public function __construct()
    {
        $this->created_at=new \DateTime();

        $this->setHashid(random_int(1,9999));
        $this->setAllowed(false);
        //$this->setCreatedby($connecteduser);


    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }


    public function getSlug():string
    {
        return (new Slugify())->slugify($this->title );
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }



    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(int $bedroom): self
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getheadttype():string{
        return self::HEAT[$this->headt];
    }
    public function getFormattedPrice():string
    {
        return number_format($this->price,0,' ',' ');
    }
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }



    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }



    public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

   

    public function getHashid(): ?string
    {
        return $this->hashid;
    }

    public function setHashid(string $hashid): self
    {
        $this->hashid = $hashid;

        return $this;
    }







    public function getAllowed(): ?bool
    {
        return $this->allowed;
    }

    public function setAllowed(bool $allowed): self
    {
        $this->allowed = $allowed;

        return $this;
    }

    public function getCreatedby(): ?string
    {
        return $this->createdby;
    }

    public function setCreatedby(string $createdby): self
    {
        $this->createdby = $createdby;

        return $this;
    }

    public function getRooms(): ?Rooms
    {
        return $this->rooms;
    }

    public function setRooms(?Rooms $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getChoix(): ?Choix
    {
        return $this->choix;
    }

    public function setChoix(?Choix $choix): self
    {
        $this->choix = $choix;

        return $this;
    }

    public function getHeat(): ?Heat
    {
        return $this->heat;
    }

    public function setHeat(?Heat $heat): self
    {
        $this->heat = $heat;

        return $this;
    }

    public function getEquipement(): ?Equipement
    {
        return $this->equipement;
    }

    public function setEquipement(?Equipement $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getPropertyname(): ?Category
    {
        return $this->propertyname;
    }

    public function setPropertyname(?Category $propertyname): self
    {
        $this->propertyname = $propertyname;

        return $this;
    }








}
