<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ApiResource]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le titre est obligatoire")
     * @Assert\Length(min="3", max="255", minMessage="Le titre doit avoir au minimum 3 caractères", maxMessage="Le titre ne doit dépasser 255 caractères")
     */
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le slug est obligatoire")
     */
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'menus')]
    /**
     * @var Type|null
     * @Assert\NotBlank(message="Le type est obligatoire")
     */
    private ?Type $type = null;

    #[ORM\ManyToOne(inversedBy: 'menus')]
    /**
     * @var Page|null
     * @Assert\NotBlank(message="La page est obligatoire")
     */
    private ?Page $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function initializeSlug()
    {
        if(empty($this->slug)){
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->title);
        }
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): self
    {
        $this->page = $page;

        return $this;
    }
}
