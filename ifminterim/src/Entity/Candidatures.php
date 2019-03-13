<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidaturesRepository")
 * @ORM\Table(name="Candidatures")
 */
class Candidatures
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
    private $id_candidat;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_offre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCandidat(): ?int
    {
        return $this->id_candidat;
    }

    public function setIdCandidat(int $id_candidat): self
    {
        $this->id_candidat = $id_candidat;

        return $this;
    }

    public function getIdOffre(): ?int
    {
        return $this->id_offre;
    }

    public function setIdOffre(int $id_offre): self
    {
        $this->id_offre = $id_offre;

        return $this;
    }
}
