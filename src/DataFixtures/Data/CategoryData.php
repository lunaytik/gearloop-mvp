<?php

namespace App\DataFixtures\Data;

class CategoryData
{
    /** @return array<mixed> */
    public static function getCategories(): array
    {
        return [
            [
                'name' => 'Clothing & Footwear',
                'color' => '#3B82F6',
                'icon' => 'shirt',
                'position' => 1,
                'children' => [
                    ['name' => 'Jackets', 'color' => '#2563EB', 'icon' => 'jacket', 'position' => 1],
                    ['name' => 'Pants', 'color' => '#1D4ED8', 'icon' => 'pants', 'position' => 2],
                    ['name' => 'Tops', 'color' => '#1E40AF', 'icon' => 'tshirt', 'position' => 3],
                    ['name' => 'Fleece', 'color' => '#1E3A8A', 'icon' => 'fleece', 'position' => 4],
                    ['name' => 'Underwear', 'color' => '#60A5FA', 'icon' => 'underwear', 'position' => 5],
                    ['name' => 'Socks', 'color' => '#93C5FD', 'icon' => 'socks', 'position' => 6],
                    ['name' => 'Footwear', 'color' => '#DBEAFE', 'icon' => 'boots', 'position' => 7],
                    ['name' => 'Accessories', 'color' => '#EFF6FF', 'icon' => 'hat', 'position' => 8]
                ]
            ],
            [
                'name' => 'Backpacks',
                'color' => '#059669',
                'icon' => 'backpack',
                'position' => 2,
                'children' => [
                    ['name' => 'Daypacks', 'color' => '#047857', 'icon' => 'daypack', 'position' => 1],
                    ['name' => 'Backpacking Packs', 'color' => '#065F46', 'icon' => 'large-pack', 'position' => 2],
                    ['name' => 'Hydration Packs', 'color' => '#10B981', 'icon' => 'hydration', 'position' => 3],
                    ['name' => 'Pack Accessories', 'color' => '#34D399', 'icon' => 'accessories', 'position' => 4]
                ]
            ],
            [
                'name' => 'Shelter',
                'color' => '#DC2626',
                'icon' => 'tent',
                'position' => 3,
                'children' => [
                    ['name' => 'Tents', 'color' => '#B91C1C', 'icon' => 'tent', 'position' => 1],
                    ['name' => 'Tarps & Bivies', 'color' => '#991B1B', 'icon' => 'tarp', 'position' => 2],
                    ['name' => 'Tent Accessories', 'color' => '#EF4444', 'icon' => 'tent-parts', 'position' => 3]
                ]
            ],
            [
                'name' => 'Sleeping',
                'color' => '#7C3AED',
                'icon' => 'sleeping-bag',
                'position' => 4,
                'children' => [
                    ['name' => 'Sleeping Bags', 'color' => '#6D28D9', 'icon' => 'sleeping-bag', 'position' => 1],
                    ['name' => 'Sleeping Pads', 'color' => '#5B21B6', 'icon' => 'sleeping-pad', 'position' => 2],
                    ['name' => 'Pillows & Comfort', 'color' => '#8B5CF6', 'icon' => 'pillow', 'position' => 3]
                ]
            ],
            [
                'name' => 'Cooking',
                'color' => '#EA580C',
                'icon' => 'stove',
                'position' => 5,
                'children' => [
                    ['name' => 'Stoves & Fuel', 'color' => '#C2410C', 'icon' => 'stove', 'position' => 1],
                    ['name' => 'Cookware', 'color' => '#9A3412', 'icon' => 'pot', 'position' => 2],
                    ['name' => 'Utensils', 'color' => '#FB923C', 'icon' => 'utensils', 'position' => 3],
                    ['name' => 'Food Storage', 'color' => '#FDBA74', 'icon' => 'container', 'position' => 4]
                ]
            ],
            [
                'name' => 'Hydration',
                'color' => '#0891B2',
                'icon' => 'water-bottle',
                'position' => 6,
                'children' => [
                    ['name' => 'Water Bottles', 'color' => '#0E7490', 'icon' => 'bottle', 'position' => 1],
                    [
                        'name' => 'Hydration Systems',
                        'color' => '#155E75',
                        'icon' => 'hydration-system',
                        'position' => 2
                    ],
                    ['name' => 'Water Treatment', 'color' => '#22D3EE', 'icon' => 'filter', 'position' => 3],
                    ['name' => 'Electrolytes', 'color' => '#67E8F9', 'icon' => 'electrolytes', 'position' => 4]
                ]
            ],
            [
                'name' => 'Electronics',
                'color' => '#4F46E5',
                'icon' => 'device',
                'position' => 7,
                'children' => [
                    ['name' => 'Navigation', 'color' => '#4338CA', 'icon' => 'gps', 'position' => 1],
                    ['name' => 'Lighting', 'color' => '#3730A3', 'icon' => 'headlamp', 'position' => 2],
                    ['name' => 'Communication', 'color' => '#6366F1', 'icon' => 'radio', 'position' => 3],
                    ['name' => 'Power & Batteries', 'color' => '#818CF8', 'icon' => 'battery', 'position' => 4]
                ]
            ],
            [
                'name' => 'Health & Safety',
                'color' => '#DC2626',
                'icon' => 'first-aid',
                'position' => 8,
                'children' => [
                    ['name' => 'First Aid', 'color' => '#B91C1C', 'icon' => 'first-aid-kit', 'position' => 1],
                    ['name' => 'Sun Protection', 'color' => '#991B1B', 'icon' => 'sunglasses', 'position' => 2],
                    ['name' => 'Emergency Gear', 'color' => '#EF4444', 'icon' => 'emergency', 'position' => 3],
                    ['name' => 'Personal Medications', 'color' => '#F87171', 'icon' => 'pills', 'position' => 4]
                ]
            ],
            [
                'name' => 'Gadgets & Gear',
                'color' => '#6B7280',
                'icon' => 'tools',
                'position' => 9,
                'children' => [
                    ['name' => 'Tools & Multi-tools', 'color' => '#4B5563', 'icon' => 'multitool', 'position' => 1],
                    ['name' => 'Trekking Poles', 'color' => '#374151', 'icon' => 'poles', 'position' => 2],
                    ['name' => 'Repair Kits', 'color' => '#9CA3AF', 'icon' => 'repair', 'position' => 3],
                    ['name' => 'Cordage & Hardware', 'color' => '#D1D5DB', 'icon' => 'rope', 'position' => 4]
                ]
            ],
            [
                'name' => 'Miscellaneous',
                'color' => '#8B5CF6',
                'icon' => 'misc',
                'position' => 10,
                'children' => [
                    ['name' => 'Personal Care', 'color' => '#7C3AED', 'icon' => 'soap', 'position' => 1],
                    ['name' => 'Comfort Items', 'color' => '#6D28D9', 'icon' => 'comfort', 'position' => 2],
                    ['name' => 'Camp Furniture', 'color' => '#A78BFA', 'icon' => 'chair', 'position' => 3],
                    ['name' => 'Organizational Gear', 'color' => '#C4B5FD', 'icon' => 'organizer', 'position' => 4]
                ]
            ]
        ];
    }
}
