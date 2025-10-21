<?php

namespace App\Twig\Components;

use App\Entity\Kit;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class KitCard
{
    public Kit $kit;
}
