<?php

namespace App\Entity;

use App\Repository\StatistiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatistiqueRepository::class)]
class Statistique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_vue = null;

    #[ORM\ManyToOne(inversedBy: 'statistiques')]
    private ?Site $id_site = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbVue(): ?int
    {
        return $this->nb_vue;
    }

    public function setNbVue(?int $nb_vue): static
    {
        $this->nb_vue = $nb_vue;

        return $this;
    }

    public function getIdSite(): ?Site
    {
        return $this->id_site;
    }

    public function setIdSite(?Site $id_site): static
    {
        $this->id_site = $id_site;

        return $this;
    }
}
