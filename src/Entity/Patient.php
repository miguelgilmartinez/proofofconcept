<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
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
    private $surname;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Heartrate::class, mappedBy="patient", orphanRemoval=true)
     */
    private $heartrates;

    public function __construct()
    {
        $this->heartrates = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeImmutable
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeImmutable $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Heartrate[]
     */
    public function getHeartrates(): Collection
    {
        return $this->heartrates;
    }

    public function addHeartrate(Heartrate $heartrate): self
    {
        if (!$this->heartrates->contains($heartrate)) {
            $this->heartrates[] = $heartrate;
            $heartrate->setPatient($this);
        }

        return $this;
    }

    public function removeHeartrate(Heartrate $heartrate): self
    {
        if ($this->heartrates->removeElement($heartrate)) {
            // set the owning side to null (unless already changed)
            if ($heartrate->getPatient() === $this) {
                $heartrate->setPatient(null);
            }
        }

        return $this;
    }
}
