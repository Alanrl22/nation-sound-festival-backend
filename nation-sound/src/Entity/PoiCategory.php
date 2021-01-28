<?php

namespace App\Entity;

use App\Repository\PoiCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PoiCategoryRepository::class)
 */
class PoiCategory
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
     * @ORM\OneToMany(targetEntity=Stage::class, mappedBy="category", orphanRemoval=true)
     */
    private $idPoi;

    public function __construct()
    {
        $this->idPoi = new ArrayCollection();
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

    /**
     * @return Collection|Stage[]
     */
    public function getIdPoi(): Collection
    {
        return $this->idPoi;
    }

    public function addIdPoi(Stage $idPoi): self
    {
        if (!$this->idPoi->contains($idPoi)) {
            $this->idPoi[] = $idPoi;
            $idPoi->setCategory($this);
        }

        return $this;
    }

    public function removeIdPoi(Stage $idPoi): self
    {
        if ($this->idPoi->removeElement($idPoi)) {
            // set the owning side to null (unless already changed)
            if ($idPoi->getCategory() === $this) {
                $idPoi->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
