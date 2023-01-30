<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ApiResource]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le titre est obligatoire")
     * @Assert\Length(min="3", max="255", minMessage="Le nombre de caractère minimum recquis est 3", maxMessage="Le nombre caractère maximum est de 255")
     */
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le slug est obligatoire")
     */
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'categories')]
    /**
     * @var Type|null
     *@Assert\NotBlank(message="Le type est obligatoire")
     */
    private ?Type $type = null;

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
}
