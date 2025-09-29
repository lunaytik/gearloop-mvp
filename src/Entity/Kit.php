<?php

namespace App\Entity;

use App\Enum\ActivityType;
use App\Enum\Season;
use App\Repository\KitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Clock\DatePoint;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: KitRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Kit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Name is required.')]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Name must be at least {{ limit }} characters long.",
        maxMessage: "Name cannot be longer than {{ limit }} characters."
    )]
    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "Name must be at least {{ limit }} characters long.",
        maxMessage: "Name cannot be longer than {{ limit }} characters."
    )]
    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[Assert\Length(
        max: 1000,
        maxMessage: 'Description cannot be longer than {{ limit }} characters'
    )]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $isPublic = null;

    #[ORM\Column(type: 'json', nullable: true, options: ['jsonb' => true])]
    private ?array $stats = null;

    #[Assert\NotBlank(message: "Activity type is required.")]
    #[ORM\Column(enumType: ActivityType::class)]
    private ?ActivityType $activityType = null;

    #[Assert\NotBlank(message: "Season is required.")]
    #[ORM\Column(enumType: Season::class)]
    private ?Season $season = null;

    #[ORM\ManyToOne(inversedBy: 'kits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    #[ORM\Column(type: 'date_point')]
    private DatePoint $createdAt;

    #[ORM\Column(type: 'date_point')]
    private DatePoint $updatedAt;

    /**
     * @var Collection<int, KitItem>
     */
    #[ORM\OneToMany(targetEntity: KitItem::class, mappedBy: 'kit', cascade: ['persist'], orphanRemoval: true)]
    private Collection $kitItems;

    public function __construct()
    {
        $now = new DatePoint();
        $this->createdAt = $now;
        $this->updatedAt = $now;
        $this->kitItems = new ArrayCollection();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new DatePoint();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

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

    public function isPublic(): ?bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): static
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    public function getStats(): ?array
    {
        return $this->stats;
    }

    public function setStats(?array $stats): static
    {
        $this->stats = $stats;

        return $this;
    }

    public function getActivityType(): ?ActivityType
    {
        return $this->activityType;
    }

    public function setActivityType(ActivityType $activityType): static
    {
        $this->activityType = $activityType;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(Season $season): static
    {
        $this->season = $season;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getCreatedAt(): ?DatePoint
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DatePoint
    {
        return $this->updatedAt;
    }

    /**
     * @return Collection<int, KitItem>
     */
    public function getKitItems(): Collection
    {
        return $this->kitItems;
    }

    public function addKitItem(KitItem $kitItem): static
    {
        if (!$this->kitItems->contains($kitItem)) {
            $this->kitItems->add($kitItem);
            $kitItem->setKit($this);
        }

        return $this;
    }

    public function removeKitItem(KitItem $kitItem): static
    {
        if ($this->kitItems->removeElement($kitItem)) {
            // set the owning side to null (unless already changed)
            if ($kitItem->getKit() === $this) {
                $kitItem->setKit(null);
            }
        }

        return $this;
    }
}
