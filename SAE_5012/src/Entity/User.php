<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $roles = null;

    #[ORM\ManyToMany(targetEntity: Site::class, inversedBy: 'id_users')]
    private Collection $users_sites;

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: Commentaire::class)]
    private Collection $commentaire;

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: Reaction::class)]
    private Collection $reaction;

    public function __construct()
    {
        $this->users_sites = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->reaction = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection<int, Site>
     */
    public function getUsersSites(): Collection
    {
        return $this->users_sites;
    }

    public function addUsersSite(Site $usersSite): static
    {
        if (!$this->users_sites->contains($usersSite)) {
            $this->users_sites->add($usersSite);
        }

        return $this;
    }

    public function removeUsersSite(Site $usersSite): static
    {
        $this->users_sites->removeElement($usersSite);

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
            $commentaire->setIdUser($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getIdUser() === $this) {
                $commentaire->setIdUser(null);
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
            $reaction->setIdUser($this);
        }

        return $this;
    }

    public function removeReaction(Reaction $reaction): static
    {
        if ($this->reaction->removeElement($reaction)) {
            // set the owning side to null (unless already changed)
            if ($reaction->getIdUser() === $this) {
                $reaction->setIdUser(null);
            }
        }

        return $this;
    }
}
