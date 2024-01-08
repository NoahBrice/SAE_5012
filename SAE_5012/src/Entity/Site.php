<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteRepository::class)]
class Site
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $path = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'users_sites')]
    private Collection $id_users;

    #[ORM\OneToMany(mappedBy: 'id_sites', targetEntity: Theme::class)]
    private Collection $theme;

    #[ORM\OneToMany(mappedBy: 'id_site', targetEntity: Mail::class)]
    private Collection $mail;

    #[ORM\OneToMany(mappedBy: 'id_site', targetEntity: Statistique::class)]
    private Collection $statistiques;

    #[ORM\OneToMany(mappedBy: 'id_site', targetEntity: DataSet::class)]
    private Collection $dataset;

    #[ORM\OneToMany(mappedBy: 'id_site', targetEntity: Page::class)]
    private Collection $page;

    public function __construct()
    {
        $this->theme = new ArrayCollection();
        $this->mail = new ArrayCollection();
        $this->statistiques = new ArrayCollection();
        $this->dataset = new ArrayCollection();
        $this->page = new ArrayCollection();
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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getIdUsers(): Collection
    {
        return $this->id_users;
    }

    public function addIdUser(User $idUser): static
    {
        if (!$this->id_users->contains($idUser)) {
            $this->id_users->add($idUser);
            $idUser->addUsersSite($this);
        }

        return $this;
    }

    public function removeIdUser(User $idUser): static
    {
        if ($this->id_users->removeElement($idUser)) {
            $idUser->removeUsersSite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Theme>
     */
    public function getTheme(): Collection
    {
        return $this->theme;
    }

    public function addTheme(Theme $theme): static
    {
        if (!$this->theme->contains($theme)) {
            $this->theme->add($theme);
            $theme->setIdSites($this);
        }

        return $this;
    }

    public function removeTheme(Theme $theme): static
    {
        if ($this->theme->removeElement($theme)) {
            // set the owning side to null (unless already changed)
            if ($theme->getIdSites() === $this) {
                $theme->setIdSites(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mail>
     */
    public function getMail(): Collection
    {
        return $this->mail;
    }

    public function addMail(Mail $mail): static
    {
        if (!$this->mail->contains($mail)) {
            $this->mail->add($mail);
            $mail->setIdSite($this);
        }

        return $this;
    }

    public function removeMail(Mail $mail): static
    {
        if ($this->mail->removeElement($mail)) {
            // set the owning side to null (unless already changed)
            if ($mail->getIdSite() === $this) {
                $mail->setIdSite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Statistique>
     */
    public function getStatistiques(): Collection
    {
        return $this->statistiques;
    }

    public function addStatistique(Statistique $statistique): static
    {
        if (!$this->statistiques->contains($statistique)) {
            $this->statistiques->add($statistique);
            $statistique->setIdSite($this);
        }

        return $this;
    }

    public function removeStatistique(Statistique $statistique): static
    {
        if ($this->statistiques->removeElement($statistique)) {
            // set the owning side to null (unless already changed)
            if ($statistique->getIdSite() === $this) {
                $statistique->setIdSite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DataSet>
     */
    public function getDataset(): Collection
    {
        return $this->dataset;
    }

    public function addDataset(DataSet $dataset): static
    {
        if (!$this->dataset->contains($dataset)) {
            $this->dataset->add($dataset);
            $dataset->setIdSite($this);
        }

        return $this;
    }

    public function removeDataset(DataSet $dataset): static
    {
        if ($this->dataset->removeElement($dataset)) {
            // set the owning side to null (unless already changed)
            if ($dataset->getIdSite() === $this) {
                $dataset->setIdSite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Page>
     */
    public function getPage(): Collection
    {
        return $this->page;
    }

    public function addPage(Page $page): static
    {
        if (!$this->page->contains($page)) {
            $this->page->add($page);
            $page->setIdSite($this);
        }

        return $this;
    }

    public function removePage(Page $page): static
    {
        if ($this->page->removeElement($page)) {
            // set the owning side to null (unless already changed)
            if ($page->getIdSite() === $this) {
                $page->setIdSite(null);
            }
        }

        return $this;
    }

}
