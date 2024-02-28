<?php

namespace App\Entity;

use App\Repository\FilmRollRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRollRepository::class)]
class FilmRoll
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'filmRolls')]
    private ?Brand $brand = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $sensibility = null;

    #[ORM\Column(nullable: true)]
    private ?array $format = null;

    #[ORM\Column(nullable: true)]
    private ?array $type = null;

    #[ORM\ManyToOne(inversedBy: 'filmRolls')]
    private ?Developer $developer = null;

    #[ORM\ManyToOne(inversedBy: 'filmRolls')]
    private ?Fixer $fixer = null;

    #[ORM\Column(nullable: true)]
    private ?int $framesQty = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $devTime = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $coverPath = null;

    #[ORM\ManyToOne(inversedBy: 'filmRolls')]
    private ?Binder $binder = null;

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

    public function getSensibility(): ?int
    {
        return $this->sensibility;
    }

    public function setSensibility(?int $sensibility): static
    {
        $this->sensibility = $sensibility;

        return $this;
    }

    public function getFormat(): ?array
    {
        return $this->format;
    }

    public function setFormat(?array $format): static
    {
        $this->format = $format;

        return $this;
    }

    public function getType(): ?array
    {
        return $this->type;
    }

    public function setType(?array $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getFramesQty2(): ?int
    {
        return $this->frames_qty2;
    }

    public function setFramesQty2(?int $frames_qty2): static
    {
        $this->frames_qty2 = $frames_qty2;

        return $this;
    }

    public function getDeveloper(): ?Developer
    {
        return $this->developer;
    }

    public function setDeveloper(?Developer $developer): static
    {
        $this->developer = $developer;

        return $this;
    }

    public function getFixer(): ?Fixer
    {
        return $this->fixer;
    }

    public function setFixer(?Fixer $fixer): static
    {
        $this->fixer = $fixer;

        return $this;
    }

    public function getFramesQty(): ?int
    {
        return $this->framesQty;
    }

    public function setFramesQty(?int $framesQty): static
    {
        $this->framesQty = $framesQty;

        return $this;
    }

    public function getDevTime(): ?\DateTimeInterface
    {
        return $this->devTime;
    }

    public function setDevTime(?\DateTimeInterface $devTime): static
    {
        $this->devTime = $devTime;

        return $this;
    }

    public function getCoverPath(): ?string
    {
        return $this->coverPath;
    }

    public function setCoverPath(?string $coverPath): static
    {
        $this->coverPath = $coverPath;

        return $this;
    }

    public function getBinder(): ?Binder
    {
        return $this->binder;
    }

    public function setBinder(?Binder $binder): static
    {
        $this->binder = $binder;

        return $this;
    }
}
