<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Bloc::class, mappedBy: 'blocs_pages')]
    private Collection $id_blocs;

    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'id_pages')]
    private Collection $page_articles;

    #[ORM\ManyToOne(inversedBy: 'page')]
    private ?Site $id_site = null;

    public function __construct()
    {
        $this->id_blocs = new ArrayCollection();
        $this->page_articles = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
            $idBloc->addBlocsPage($this);
        }

        return $this;
    }

    public function removeIdBloc(Bloc $idBloc): static
    {
        if ($this->id_blocs->removeElement($idBloc)) {
            $idBloc->removeBlocsPage($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getPageArticles(): Collection
    {
        return $this->page_articles;
    }

    public function addPageArticle(Article $pageArticle): static
    {
        if (!$this->page_articles->contains($pageArticle)) {
            $this->page_articles->add($pageArticle);
        }

        return $this;
    }

    public function removePageArticle(Article $pageArticle): static
    {
        $this->page_articles->removeElement($pageArticle);

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
