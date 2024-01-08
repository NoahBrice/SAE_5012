<?php

namespace App\Entity;

use App\Repository\DataSetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataSetRepository::class)]
class DataSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $json_path = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dataSet_path = null;

    #[ORM\ManyToOne(inversedBy: 'dataset')]
    private ?Site $id_site = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getJsonPath(): ?string
    {
        return $this->json_path;
    }

    public function setJsonPath(?string $json_path): static
    {
        $this->json_path = $json_path;

        return $this;
    }

    public function getDataSetPath(): ?string
    {
        return $this->dataSet_path;
    }

    public function setDataSetPath(?string $dataSet_path): static
    {
        $this->dataSet_path = $dataSet_path;

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
