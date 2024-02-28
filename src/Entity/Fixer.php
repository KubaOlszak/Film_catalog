<?php

namespace App\Entity;

use App\Repository\FixerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FixerRepository::class)]
class Fixer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fixers')]
    private ?Brand $brand = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: FilmRoll::class, mappedBy: 'fixer')]
    private Collection $filmRolls;

    public function __construct()
    {
        $this->filmRolls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, FilmRoll>
     */
    public function getFilmRolls(): Collection
    {
        return $this->filmRolls;
    }

    public function addFilmRoll(FilmRoll $filmRoll): static
    {
        if (!$this->filmRolls->contains($filmRoll)) {
            $this->filmRolls->add($filmRoll);
            $filmRoll->setFixer($this);
        }

        return $this;
    }

    public function removeFilmRoll(FilmRoll $filmRoll): static
    {
        if ($this->filmRolls->removeElement($filmRoll)) {
            // set the owning side to null (unless already changed)
            if ($filmRoll->getFixer() === $this) {
                $filmRoll->setFixer(null);
            }
        }

        return $this;
    }
}
