<?php

namespace App\Twig\Components;

use App\Entity\Item;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ItemCard
{
    public Item $item;
}
