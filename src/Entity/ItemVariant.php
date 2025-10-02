<?php

namespace App\Entity;

use App\Repository\ItemVariantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Clock\DatePoint;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ItemVariantRepository::class)]
#[ORM\UniqueConstraint(name: 'uniq_item_default_variant', columns: ['item_id'], options: ['where' => 'is_default = true'])]
#[ORM\HasLifecycleCallbacks]
class ItemVariant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Name is required.')]
    #[Assert\Length(
        min: 1,
        max: 100,
        minMessage: 'Name must be at least {{ limit }} characters long.',
        maxMessage: 'Name cannot be longer than {{ limit }} characters.'
    )]
    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[Assert\Length(
        min: 6,
        max: 12,
        minMessage: 'SKU must be at least {{ limit }} characters long.',
        maxMessage: 'SKU cannot be longer than {{ limit }} characters.'
    )]
    #[ORM\Column(length: 12, nullable: true)]
    private ?string $sku = null;

    #[Assert\Range(
        notInRangeMessage: 'Weight must be between {{ min }} and {{ max }}',
        min: 1,
        max: 10000
    )]
    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[Assert\Range(
        notInRangeMessage: 'Price must be between {{ min }} and {{ max }}',
        min: 1.00,
        max: 9999.99
    )]
    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2, nullable: true)]
    private ?string $price = null;

    #[ORM\Column(type: 'json', nullable: true, options: ['jsonb' => true])]
    private ?array $specifications = null;

    #[ORM\Column]
    private ?bool $isDefault = null;

    #[ORM\Column(type: 'date_point')]
    private DatePoint $createdAt;

    #[ORM\Column(type: 'date_point')]
    private DatePoint $updatedAt;

    #[ORM\ManyToOne(inversedBy: 'itemVariants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;

    public function __construct()
    {
        $now = new DatePoint();
        $this->createdAt = $now;
        $this->updatedAt = $now;
        $this->isDefault = false;
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

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

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

    public function isDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): static
    {
        $this->isDefault = $isDefault;

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

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): static
    {
        $this->item = $item;

        return $this;
    }
}
