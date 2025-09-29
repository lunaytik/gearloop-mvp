<?php

namespace App\Service;

use App\Entity\Kit;
use App\Entity\KitItem;
use Symfony\Component\Clock\DatePoint;

class KitStatsCalculator
{
    public function calculateStats(Kit $kit): array
    {
        $stats = [
            'total_weight' => 0,
            'total_price' => 0.0,
            'items_count' => 0,
            'unique_items_count' => 0,
            'category_breakdown' => [],
            'calculated_at' => (new DatePoint()),
        ];

        foreach ($kit->getKitItems() as $kitItem) {
            $this->processKitItem($kitItem, $stats);
        }

        $this->calculateDistributions($stats);

        return $stats;
    }

    private function processKitItem(KitItem $kitItem, array &$stats): void
    {
        $variant = $kitItem->getVariant();
        $category = $variant->getItem()->getCategory();
        $quantity = $kitItem->getQuantity();

        $itemWeight = $variant->getWeight() * $quantity;
        $itemPrice = ($variant->getPrice() ?? 0.0) * $quantity;

        $stats['total_weight'] += $itemWeight;
        $stats['total_price'] += $itemPrice;
        $stats['items_count'] += $quantity;
        $stats['unique_items_count']++;

        $categoryName = $category->getName();
        if (!isset($stats['category_breakdown'][$categoryName])) {
            $stats['category_breakdown'][$categoryName] = [
                'weight' => 0,
                'price' => 0.0,
                'count' => 0,
                'icon' => $category->getIcon(),
            ];
        }

        $stats['category_breakdown'][$categoryName]['weight'] += $itemWeight;
        $stats['category_breakdown'][$categoryName]['price'] += $itemPrice;
        $stats['category_breakdown'][$categoryName]['count'] += $quantity;
    }

    private function calculateDistributions(array &$stats): void
    {
        $totalWeight = $stats['total_weight'];

        if ($totalWeight > 0) {
            foreach ($stats['category_breakdown'] as $category => &$breakdown) {
                $breakdown['weight_percentage'] = round(($breakdown['weight'] / $totalWeight) * 100, 1);
            }
        }

        uasort($stats['category_breakdown'], fn($a, $b) => $b['weight'] <=> $a['weight']);
    }
}
