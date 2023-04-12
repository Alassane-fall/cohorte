<?php

namespace App\Entity;

use App\Repository\CohorteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CohorteRepository::class)]
class Cohorte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CodeCohorte = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateFin = null;

    #[ORM\Column]
    private ?int $NombreParticipants = null;

    #[ORM\Column(length: 255)]
    private ?string $Parrain = null;

    #[ORM\Column]
    private ?int $IdFormation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCohorte(): ?string
    {
        return $this->CodeCohorte;
    }

    public function setCodeCohorte(string $CodeCohorte): self
    {
        $this->CodeCohorte = $CodeCohorte;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getNombreParticipants(): ?int
    {
        return $this->NombreParticipants;
    }

    public function setNombreParticipants(int $NombreParticipants): self
    {
        $this->NombreParticipants = $NombreParticipants;

        return $this;
    }

    public function getParrain(): ?string
    {
        return $this->Parrain;
    }

    public function setParrain(string $Parrain): self
    {
        $this->Parrain = $Parrain;

        return $this;
    }

    public function getIdFormation(): ?int
    {
        return $this->IdFormation;
    }

    public function setIdFormation(int $IdFormation): self
    {
        $this->IdFormation = $IdFormation;

        return $this;
    }
}
