<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 96)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Developer::class, mappedBy: 'brand')]
    private Collection $developers;

    #[ORM\OneToMany(targetEntity: Fixer::class, mappedBy: 'brand')]
    private Collection $fixers;

    #[ORM\OneToMany(targetEntity: FilmRoll::class, mappedBy: 'brand')]
    private Collection $filmRolls;

    public function __construct()
    {
        $this->developers = new ArrayCollection();
        $this->fixers = new ArrayCollection();
        $this->filmRolls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Developer>
     */
    public function getDevelopers(): Collection
    {
        return $this->developers;
    }

    public function addDeveloper(Developer $developer): static
    {
        if (!$this->developers->contains($developer)) {
            $this->developers->add($developer);
            $developer->setBrand($this);
        }

        return $this;
    }

    public function removeDeveloper(Developer $developer): static
    {
        if ($this->developers->removeElement($developer)) {
            // set the owning side to null (unless already changed)
            if ($developer->getBrand() === $this) {
                $developer->setBrand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fixer>
     */
    public function getFixers(): Collection
    {
        return $this->fixers;
    }

    public function addFixer(Fixer $fixer): static
    {
        if (!$this->fixers->contains($fixer)) {
            $this->fixers->add($fixer);
            $fixer->setBrand($this);
        }

        return $this;
    }

    public function removeFixer(Fixer $fixer): static
    {
        if ($this->fixers->removeElement($fixer)) {
            // set the owning side to null (unless already changed)
            if ($fixer->getBrand() === $this) {
                $fixer->setBrand(null);
            }
        }

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
            $filmRoll->setBrand($this);
        }

        return $this;
    }

    public function removeFilmRoll(FilmRoll $filmRoll): static
    {
        if ($this->filmRolls->removeElement($filmRoll)) {
            // set the owning side to null (unless already changed)
            if ($filmRoll->getBrand() === $this) {
                $filmRoll->setBrand(null);
            }
        }

        return $this;
    }
}
