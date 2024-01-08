<?php

namespace App\Entity;

use App\Repository\TypeGraphiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeGraphiqueRepository::class)]
class TypeGraphique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Bloc::class, mappedBy: 'type_graphique_blocs')]
    private Collection $id_bloc;

    public function __construct()
    {
        $this->id_bloc = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Bloc>
     */
    public function getIdBloc(): Collection
    {
        return $this->id_bloc;
    }

    public function addIdBloc(Bloc $idBloc): static
    {
        if (!$this->id_bloc->contains($idBloc)) {
            $this->id_bloc->add($idBloc);
            $idBloc->addTypeGraphiqueBloc($this);
        }

        return $this;
    }

    public function removeIdBloc(Bloc $idBloc): static
    {
        if ($this->id_bloc->removeElement($idBloc)) {
            $idBloc->removeTypeGraphiqueBloc($this);
        }

        return $this;
    }
}
