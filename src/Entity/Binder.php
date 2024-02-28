<?php

namespace App\Entity;

use App\Repository\BinderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BinderRepository::class)]
class Binder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $no = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(targetEntity: FilmRoll::class, mappedBy: 'binder')]
    private Collection $filmRolls;

    public function __construct()
    {
        $this->filmRolls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNo(): ?int
    {
        return $this->no;
    }

    public function setNo(?int $no): static
    {
        $this->no = $no;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
            $filmRoll->setBinder($this);
        }

        return $this;
    }

    public function removeFilmRoll(FilmRoll $filmRoll): static
    {
        if ($this->filmRolls->removeElement($filmRoll)) {
            // set the owning side to null (unless already changed)
            if ($filmRoll->getBinder() === $this) {
                $filmRoll->setBinder(null);
            }
        }

        return $this;
    }
}
