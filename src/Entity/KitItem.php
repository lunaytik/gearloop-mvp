<?php

namespace App\Entity;

use App\Repository\KitItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Clock\DatePoint;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: KitItemRepository::class)]
#[ORM\UniqueConstraint(name: 'uniq_kit_variant', columns: ['kit_id', 'variant_id'])]
class KitItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'kitItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Kit $kit = null;

    #[Assert\NotBlank(message: 'Item is required.')]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ItemVariant $variant = null;

    #[Assert\NotBlank(message: 'Quantity is required.')]
    #[Assert\Range(
        notInRangeMessage: 'Quantity must be between {{ min }} and {{ max }}.',
        min: 1,
        max: 100,
    )]
    #[ORM\Column]
    private ?int $quantity = null;

    #[Assert\Length(
        max: 500,
        maxMessage: 'Description cannot be longer than {{ limit }} characters'
    )]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $personalNotes = null;

    #[ORM\Column(type: 'date_point')]
    private DatePoint $addedAt;

    public function __construct()
    {
        $this->addedAt = new DatePoint();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKit(): ?Kit
    {
        return $this->kit;
    }

    public function setKit(?Kit $kit): static
    {
        $this->kit = $kit;

        return $this;
    }

    public function getVariant(): ?ItemVariant
    {
        return $this->variant;
    }

    public function setVariant(?ItemVariant $variant): static
    {
        $this->variant = $variant;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPersonalNotes(): ?string
    {
        return $this->personalNotes;
    }

    public function setPersonalNotes(?string $personalNotes): static
    {
        $this->personalNotes = $personalNotes;

        return $this;
    }

    public function getAddedAt(): ?DatePoint
    {
        return $this->addedAt;
    }
}
