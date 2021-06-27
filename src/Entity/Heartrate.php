<?php

namespace App\Entity;

use App\Repository\HeartrateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeartrateRepository::class)
 */
class Heartrate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $bpm;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="heartrates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBpm(): ?int
    {
        return $this->bpm;
    }

    public function setBpm(int $bpm): self
    {
        $this->bpm = $bpm;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}
