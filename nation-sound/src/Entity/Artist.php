<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtistRepository::class)
 */
class Artist
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bigArtist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=concert::class, mappedBy="artist")
     */
    private $concert;

    /**
     * @ORM\ManyToOne(targetEntity=Meeting::class, inversedBy="artist")
     */
    private $meeting;

    /**
     * @ORM\ManyToMany(targetEntity=festival::class, inversedBy="artists")
     */
    private $festival;

    public function __construct()
    {
        $this->concert = new ArrayCollection();
        $this->festival = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isBigArtist(): ?bool
    {
        return $this->bigArtist;
    }

    public function setBigArtist(bool $bigArtist): self
    {
        $this->bigArtist = $bigArtist;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|concert[]
     */
    public function getConcert(): Collection
    {
        return $this->concert;
    }

    public function addConcert(concert $concert): self
    {
        if (!$this->concert->contains($concert)) {
            $this->concert[] = $concert;
            $concert->setArtist($this);
        }

        return $this;
    }

    public function removeConcert(concert $concert): self
    {
        if ($this->concert->removeElement($concert)) {
            // set the owning side to null (unless already changed)
            if ($concert->getArtist() === $this) {
                $concert->setArtist(null);
            }
        }

        return $this;
    }

    public function getMeeting(): ?Meeting
    {
        return $this->meeting;
    }

    public function setMeeting(?Meeting $meeting): self
    {
        $this->meeting = $meeting;

        return $this;
    }

    /**
     * @return Collection|festival[]
     */
    public function getFestival(): Collection
    {
        return $this->festival;
    }

    public function addFestival(festival $festival): self
    {
        if (!$this->festival->contains($festival)) {
            $this->festival[] = $festival;
        }

        return $this;
    }

    public function removeFestival(festival $festival): self
    {
        $this->festival->removeElement($festival);

        return $this;
    }

}
