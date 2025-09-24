<?php

namespace App\Entity;

use App\Enum\ItemStatus;
use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Clock\DatePoint;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ORM\Index(name: 'idx_item_specifications_gin', columns: ['specifications'], options: ['gin'])]
#[ORM\HasLifecycleCallbacks]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: "Name is required.")]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Name must be at least {{ limit }} characters long.",
        maxMessage: "Name cannot be longer than {{ limit }} characters."
    )]
    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[Assert\NotBlank(message: "Brand is required.")]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Brand must be at least {{ limit }} characters long.",
        maxMessage: "Brand cannot be longer than {{ limit }} characters."
    )]
    #[ORM\Column(length: 100)]
    private ?string $brand = null;

    #[Assert\NotBlank(message: "Model is required.")]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Model must be at least {{ limit }} characters long.",
        maxMessage: "Model cannot be longer than {{ limit }} characters."
    )]
    #[ORM\Column(length: 100)]
    private ?string $model = null;

    #[Assert\Length(
        max: 500,
        maxMessage: 'Description cannot be longer than {{ limit }} characters'
    )]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[Assert\Url(message: 'Invalid URL format')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Image URL cannot be longer than {{ limit }} characters'
    )]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: 'json', nullable: true, options: ['jsonb' => true])]
    private ?array $specifications = null;

    #[ORM\Column]
    private bool $isActive;

    #[Assert\NotBlank(message: "Status is required.")]
    #[ORM\Column(enumType: ItemStatus::class)]
    private ?ItemStatus $status = null;

    #[ORM\Column(type: 'date_point')]
    private DatePoint $createdAt;

    #[ORM\Column(type: 'date_point')]
    private DatePoint $updatedAt;

    #[ORM\Column(type: 'date_point', nullable: true)]
    private ?DatePoint $validatedAt = null;

    #[ORM\Column(type: 'date_point', nullable: true)]
    private ?DatePoint $deletedAt = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'created_by_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private ?User $createdBy = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Category $category = null;

    /**
     * @var Collection<int, ItemVariant>
     */
    #[ORM\OneToMany(targetEntity: ItemVariant::class, mappedBy: 'item')]
    private Collection $itemVariants;

    public function __construct()
    {
        $now = new DatePoint();
        $this->createdAt = $now;
        $this->updatedAt = $now;
        $this->isActive = true;
        $this->itemVariants = new ArrayCollection();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new DatePoint();
    }

    public function setValidatedAtValue(): void
    {
        $this->updatedAt = new DatePoint();
    }

    public function softDelete(): void
    {
        $this->isActive = false;
        $this->deletedAt = new DatePoint();
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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

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

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getSpecifications(): ?array
    {
        return $this->specifications;
    }

    public function setSpecifications(?array $specifications): static
    {
        $this->specifications = $specifications;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getStatus(): ?ItemStatus
    {
        return $this->status;
    }

    public function setStatus(ItemStatus $itemStatus): static
    {
        $this->status = $itemStatus;

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

    public function getValidatedAt(): ?DatePoint
    {
        return $this->validatedAt;
    }

    public function getDeletedAt(): ?DatePoint
    {
        return $this->deletedAt;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $user): static {
        $this->createdBy = $user;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, ItemVariant>
     */
    public function getItemVariants(): Collection
    {
        return $this->itemVariants;
    }

    public function addItemVariant(ItemVariant $itemVariant): static
    {
        if (!$this->itemVariants->contains($itemVariant)) {
            $this->itemVariants->add($itemVariant);
            $itemVariant->setItem($this);
        }

        return $this;
    }

    public function removeItemVariant(ItemVariant $itemVariant): static
    {
        if ($this->itemVariants->removeElement($itemVariant)) {
            // set the owning side to null (unless already changed)
            if ($itemVariant->getItem() === $this) {
                $itemVariant->setItem(null);
            }
        }

        return $this;
    }
}
