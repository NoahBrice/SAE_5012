<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlocRepository::class)]
class Bloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $texte = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(nullable: true)]
    private ?bool $notable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $style_path = null;

    #[ORM\ManyToMany(targetEntity: TypeGraphique::class, inversedBy: 'id_bloc')]
    private Collection $type_graphique_blocs;

    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'id_blocs')]
    private Collection $blocs_articles;

    #[ORM\ManyToMany(targetEntity: Page::class, inversedBy: 'id_blocs')]
    private Collection $blocs_pages;

    #[ORM\OneToMany(mappedBy: 'id_blocs', targetEntity: Commentaire::class)]
    private Collection $commentaire;

    #[ORM\OneToMany(mappedBy: 'id_blocs', targetEntity: Reaction::class)]
    private Collection $reaction;

    #[ORM\ManyToOne(inversedBy: 'bloc')]
    private ?TypeBloc $id_type_bloc = null;

    public function __construct()
    {
        $this->type_graphique_blocs = new ArrayCollection();
        $this->blocs_articles = new ArrayCollection();
        $this->blocs_pages = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->reaction = new ArrayCollection();
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

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function isNotable(): ?bool
    {
        return $this->notable;
    }

    public function setNotable(?bool $notable): static
    {
        $this->notable = $notable;

        return $this;
    }

    public function getStylePath(): ?string
    {
        return $this->style_path;
    }

    public function setStylePath(?string $style_path): static
    {
        $this->style_path = $style_path;

        return $this;
    }

    /**
     * @return Collection<int, TypeGraphique>
     */
    public function getTypeGraphiqueBlocs(): Collection
    {
        return $this->type_graphique_blocs;
    }

    public function addTypeGraphiqueBloc(TypeGraphique $typeGraphiqueBloc): static
    {
        if (!$this->type_graphique_blocs->contains($typeGraphiqueBloc)) {
            $this->type_graphique_blocs->add($typeGraphiqueBloc);
        }

        return $this;
    }

    public function removeTypeGraphiqueBloc(TypeGraphique $typeGraphiqueBloc): static
    {
        $this->type_graphique_blocs->removeElement($typeGraphiqueBloc);

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getBlocsArticles(): Collection
    {
        return $this->blocs_articles;
    }

    public function addBlocsArticle(Article $blocsArticle): static
    {
        if (!$this->blocs_articles->contains($blocsArticle)) {
            $this->blocs_articles->add($blocsArticle);
        }

        return $this;
    }

    public function removeBlocsArticle(Article $blocsArticle): static
    {
        $this->blocs_articles->removeElement($blocsArticle);

        return $this;
    }

    /**
     * @return Collection<int, Page>
     */
    public function getBlocsPages(): Collection
    {
        return $this->blocs_pages;
    }

    public function addBlocsPage(Page $blocsPage): static
    {
        if (!$this->blocs_pages->contains($blocsPage)) {
            $this->blocs_pages->add($blocsPage);
        }

        return $this;
    }

    public function removeBlocsPage(Page $blocsPage): static
    {
        $this->blocs_pages->removeElement($blocsPage);

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire->add($commentaire);
            $commentaire->setIdBlocs($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getIdBlocs() === $this) {
                $commentaire->setIdBlocs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reaction>
     */
    public function getReaction(): Collection
    {
        return $this->reaction;
    }

    public function addReaction(Reaction $reaction): static
    {
        if (!$this->reaction->contains($reaction)) {
            $this->reaction->add($reaction);
            $reaction->setIdBlocs($this);
        }

        return $this;
    }

    public function removeReaction(Reaction $reaction): static
    {
        if ($this->reaction->removeElement($reaction)) {
            // set the owning side to null (unless already changed)
            if ($reaction->getIdBlocs() === $this) {
                $reaction->setIdBlocs(null);
            }
        }

        return $this;
    }

    public function getIdTypeBloc(): ?TypeBloc
    {
        return $this->id_type_bloc;
    }

    public function setIdTypeBloc(?TypeBloc $id_type_bloc): static
    {
        $this->id_type_bloc = $id_type_bloc;

        return $this;
    }
}
