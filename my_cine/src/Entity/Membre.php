<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembreRepository")
 */
class Membre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_abo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_inscription;

    

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Abonnement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $abo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FichePerso", cascade={"persist", "remove"})
     */
    private $ficheperso;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAbo(): ?\DateTimeInterface
    {
        return $this->date_abo;
    }

    public function setDateAbo(\DateTimeInterface $date_abo): self
    {
        $this->date_abo = $date_abo;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }



    public function getAbo(): ?Abonnement
    {
        return $this->abo;
    }

    public function setAbo(?Abonnement $abo): self
    {
        $this->abo = $abo;

        return $this;
    }

    public function getFicheperso(): ?FichePerso
    {
        return $this->ficheperso;
    }

    public function setFicheperso(?FichePerso $ficheperso): self
    {
        $this->ficheperso = $ficheperso;

        return $this;
    }
}
