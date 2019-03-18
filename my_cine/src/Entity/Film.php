<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resume;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sortie;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree_min;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getSortie(): ?\DateTimeInterface
    {
        return $this->sortie;
    }

    public function setSortie(\DateTimeInterface $sortie): self
    {
        $this->sortie = $sortie;

        return $this;
    }

    public function getDureeMin(): ?int
    {
        return $this->duree_min;
    }

    public function setDureeMin(int $duree_min): self
    {
        $this->duree_min = $duree_min;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

}
