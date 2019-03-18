<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalleRepository")
 */
class Salle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_salle;

    /**
     * @ORM\Column(type="integer")
     */
    private $etage_salle;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_siege;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroSalle(): ?int
    {
        return $this->numero_salle;
    }

    public function setNumeroSalle(int $numero_salle): self
    {
        $this->numero_salle = $numero_salle;

        return $this;
    }

    public function getEtageSalle(): ?int
    {
        return $this->etage_salle;
    }

    public function setEtageSalle(int $etage_salle): self
    {
        $this->etage_salle = $etage_salle;

        return $this;
    }

    public function getNbrSiege(): ?int
    {
        return $this->nbr_siege;
    }

    public function setNbrSiege(int $nbr_siege): self
    {
        $this->nbr_siege = $nbr_siege;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }
}
