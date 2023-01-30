<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: PageRepository::class)]
#[ApiResource]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le titre est obligatoire")
     * @Assert\Length(min="3", max="255", minMessage="Le nombre de caractère minimum recquis est 3", maxMessage="Le nombre caractère maximum est de 255")
     */
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le Titre à affciher est obligatoire")
     * @Assert\Length(min="3", max="255", minMessage="Le nombre de caractère minimum recquis est 3", maxMessage="Le nombre caractère maximum est de 255")
     */
    private ?string $displayName = null;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le slug est obligatoire")
     */
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: Menu::class)]
    private Collection $menus;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="la meta description de l'article est obligatoire")
     */
    private ?string $meta = null;

    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'pages')]
    /**
     * @var ArrayCollection|Collection
     * @Assert\NotBlank(message="Le média est obligatoire")
     */
    private Collection $medias;

    #[ORM\ManyToOne(inversedBy: 'pages')]
    private ?User $author = null;

    #[ORM\ManyToMany(targetEntity: Post::class, mappedBy: 'pages')]
    private Collection $posts;

    #[ORM\ManyToOne(inversedBy: 'pages')]
    private ?Type $type = null;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->medias = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function initializeSlug()
    {
        if(empty($this->slug)){
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->displayName);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus->add($menu);
            $menu->setPage($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getPage() === $this) {
                $menu->setPage(null);
            }
        }

        return $this;
    }

    public function getMeta(): ?string
    {
        return $this->meta;
    }

    public function setMeta(?string $meta): self
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->medias->contains($media)) {
            $this->medias->add($media);
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        $this->medias->removeElement($media);

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->addPage($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->removeElement($post)) {
            $post->removePage($this);
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
