<?php

namespace App\Service;

use App\Entity\Kit;

class KitRecalculationQueue
{
    /** @var Kit[] */
    private array $kits = [];

    public function addKit(?Kit $kit): void
    {
        if ($kit) {
            $this->kits[spl_object_hash($kit)] = $kit;
        }
    }

    /** @return Kit[] */
    public function consume(): array
    {
        $kits = $this->kits;
        $this->kits = [];
        return $kits;
    }

    public function hasKits(): bool
    {
        return !empty($this->kits);
    }
}
