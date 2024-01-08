<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resume = null;

    #[ORM\Column(nullable: true)]
    private ?int $position = null;

    #[ORM\ManyToMany(targetEntity: Bloc::class, mappedBy: 'blocs_articles')]
    private Collection $id_blocs;

    #[ORM\ManyToMany(targetEntity: Page::class, mappedBy: 'page_articles')]
    private Collection $id_pages;

    public function __construct()
    {
        $this->id_blocs = new ArrayCollection();
        $this->id_pages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, Bloc>
     */
    public function getIdBlocs(): Collection
    {
        return $this->id_blocs;
    }

    public function addIdBloc(Bloc $idBloc): static
    {
        if (!$this->id_blocs->contains($idBloc)) {
            $this->id_blocs->add($idBloc);
            $idBloc->addBlocsArticle($this);
        }

        return $this;
    }

    public function removeIdBloc(Bloc $idBloc): static
    {
        if ($this->id_blocs->removeElement($idBloc)) {
            $idBloc->removeBlocsArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Page>
     */
    public function getIdPages(): Collection
    {
        return $this->id_pages;
    }

    public function addIdPage(Page $idPage): static
    {
        if (!$this->id_pages->contains($idPage)) {
            $this->id_pages->add($idPage);
            $idPage->addPageArticle($this);
        }

        return $this;
    }

    public function removeIdPage(Page $idPage): static
    {
        if ($this->id_pages->removeElement($idPage)) {
            $idPage->removePageArticle($this);
        }

        return $this;
    }
}
