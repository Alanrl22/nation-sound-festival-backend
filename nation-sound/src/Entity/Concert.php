<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertRepository::class)
 */
class Concert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity=Artist::class, inversedBy="concert")
     */
    private $artist;

    /**
     * @ORM\ManyToOne(targetEntity=Stage::class, inversedBy="concerts")
     */
    private $stage;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Day;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Hour;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getStage(): ?stage
    {
        return $this->stage;
    }

    public function setStage(?stage $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->Day;
    }

    public function setDay(?\DateTimeInterface $Day): self
    {
        $this->Day = $Day;

        return $this;
    }

    public function getHour(): ?\DateTimeInterface
    {
        return $this->Hour;
    }

    public function setHour(?\DateTimeInterface $Hour): self
    {
        $this->Hour = $Hour;

        return $this;
    }
}
