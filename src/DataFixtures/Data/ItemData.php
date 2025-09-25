<?php

namespace App\DataFixtures\Data;

class ItemData
{
    /** @return array */
    public static function getItems(): array
    {
        return [
            [
                'name' => 'Patagonia Houdini Windbreaker',
                'brand' => 'Patagonia',
                'model' => 'Houdini',
                'description' => 'Ultra-lightweight wind shell for trail running and hiking. Packs into its own chest pocket.',
                'categorySlug' => 'jackets',
                'status' => 'validated',
                'specifications' => [
                    'material' => 'DWR-treated nylon ripstop',
                    'waterproof' => false,
                    'windproof' => true,
                    'breathable' => true,
                    'packable' => true,
                    'hood' => true,
                    'pockets' => 2,
                    'seasons' => ['spring', 'summer', 'autumn'],
                    'activities' => ['hiking', 'trail_running', 'climbing'],
                    'fit' => 'regular',
                    'insulation_type' => 'none'
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'PA_HO_0001',
                        'weight' => 105,
                        'price' => '110.00',
                        'specifications' => [
                            'color' => 'clement blue'
                        ],
                    ]
                ]
            ],
            [
                'name' => 'Prana Stretch Zion Pants',
                'brand' => 'Prana',
                'model' => 'Stretch Zion',
                'description' => 'Durable stretch hiking pants with water-repellent finish. Great mobility.',
                'categorySlug' => 'pants',
                'status' => 'validated',
                'specifications' => [
                    'material' => '97% nylon, 3% elastane',
                    'water_resistant' => true,
                    'stretch' => true,
                    'upf_rating' => 50,
                    'inseam_options' => ['30"', '32"', '34"'],
                    'pockets' => 5,
                    'reinforced_knees' => true,
                    'gusseted_crotch' => true,
                    'belt_loops' => true,
                    'activities' => ['hiking', 'climbing', 'travel'],
                    'seasons' => ['spring', 'summer', 'autumn']
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'PR_ST_0001',
                        'weight' => null,
                        'price' => '80.00',
                        'specifications' => [
                            'color' => 'shadow',
                            'inseam' => 34,
                            'size' => 38
                        ],
                    ]
                ]
            ],
            [
                'name' => 'Smartwool Merino 150 Base Layer',
                'brand' => 'Smartwool',
                'model' => 'Merino 150',
                'description' => 'Lightweight merino wool base layer. Natural odor resistance and moisture management.',
                'categorySlug' => 'tops',
                'status' => 'validated',
                'specifications' => [
                    'material' => '88% merino wool, 12% nylon',
                    'fabric_weight' => '150 gsm',
                    'odor_resistant' => true,
                    'moisture_wicking' => true,
                    'temperature_regulation' => true,
                    'upf_rating' => 25,
                    'flatlock_seams' => true,
                    'activities' => ['hiking', 'running', 'layering'],
                    'seasons' => ['spring', 'summer', 'autumn', 'winter'],
                    'care' => 'machine_wash_cold'
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'SM_ME_0001',
                        'weight' => 154,
                        'price' => '89.95',
                        'specifications' => [
                            'color' => 'nightfall blue',
                            'available-sizes' => ['S', 'M', 'L', 'XL'],
                            'suggested_use' => 'Cool (5°C - 15°C)'
                        ],
                    ]
                ]
            ],
            [
                'name' => 'Patagonia R1 Daily Jacket',
                'brand' => 'Patagonia',
                'model' => 'R1 Daily',
                'description' => 'Technical fleece for active pursuits. Excellent breathability and stretch.',
                'categorySlug' => 'fleece',
                'status' => 'validated',
                'specifications' => [
                    'material' => 'Polartec Power Grid',
                    'fabric_weight' => '6.8 oz/sq yd',
                    'stretch' => true,
                    'breathable' => true,
                    'quick_dry' => true,
                    'thumb_loops' => true,
                    'full_zip' => true,
                    'pockets' => 2,
                    'activities' => ['hiking', 'climbing', 'skiing'],
                    'temperature_range' => '32-60°F',
                    'seasons' => ['autumn', 'winter', 'spring']
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'PA_R1_0001',
                        'weight' => 275,
                        'price' => '130.00',
                        'specifications' => [
                            'color' => 'ink black',
                            'available-sizes' => ['S', 'M', 'L', 'XL'],
                        ],
                    ]
                ]
            ],
            [
                'name' => 'Men\'s Merino Boxer Brief',
                'brand' => 'Smartwool',
                'model' => 'Boxer Brief',
                'description' => 'Merino wool boxer briefs with seamless construction. Chafe-free comfort.',
                'categorySlug' => 'underwear',
                'status' => 'validated',
                'specifications' => [
                    'material' => '88% Merino Wool, 12% Recycled',
                    'seamless_construction' => true,
                    'odor_resistant' => true,
                    'moisture_wicking' => true,
                    'chafe_free' => true,
                    'inseam_length' => '12cm',
                    'activities' => ['hiking', 'running', 'travel'],
                    'seasons' => ['all_season'],
                    'care' => 'machine_wash_cold'
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'SM_BO_0001',
                        'weight' => null,
                        'price' => '40.00',
                    ]
                ]
            ],
            [
                'name' => 'Darn Tough Vermont Hiker Boot Sock',
                'brand' => 'Darn Tough',
                'model' => 'Hiker Boot',
                'weight' => 70,
                'price' => '23.95',
                'description' => 'Merino wool hiking socks with lifetime guarantee. Cushioned for comfort.',
                'categorySlug' => 'socks',
                'status' => 'validated',
                'specifications' => [
                    'material' => '62% merino wool, 32% nylon, 2% lycra spandex',
                    'cushioning' => 'full',
                    'height' => 'boot',
                    'seamless_toe' => true,
                    'odor_resistant' => true,
                    'moisture_wicking' => true,
                    'lifetime_warranty' => true,
                    'activities' => ['hiking', 'backpacking', 'work'],
                    'seasons' => ['all_season'],
                    'made_in' => 'Vermont, USA'
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'DA_HI_0001',
                        'weight' => null,
                        'price' => '25.56',
                        'specifications' => [],
                    ]
                ]
            ],
            [
                'name' => 'Salomon X Ultra 3 GTX',
                'brand' => 'Salomon',
                'model' => 'X Ultra 3 GTX',
                'description' => 'Waterproof hiking shoes with Contragrip sole. Excellent grip and comfort.',
                'categorySlug' => 'footwear',
                'status' => 'validated',
                'specifications' => [
                    'waterproof' => true,
                    'waterproof_tech' => 'Gore-Tex',
                    'sole_technology' => 'Contragrip',
                    'drop' => '11mm',
                    'lug_depth' => '5mm',
                    'upper_material' => 'synthetic and textile',
                    'lacing_validated' => 'quicklace',
                    'toe_protection' => true,
                    'activities' => ['day_hiking', 'backpacking', 'approach'],
                    'terrain' => ['trail', 'mixed', 'technical'],
                    'seasons' => ['spring', 'summer', 'autumn']
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'SA_XU_0001',
                        'weight' => 330,
                        'price' => '140.00',
                        'specifications' => [],
                    ]
                ]
            ],
            [
                'name' => 'Patagonia P-6 Logo Trucker Hat',
                'brand' => 'Patagonia',
                'model' => 'P-6 Logo Trucker',
                'description' => 'Classic trucker hat with organic cotton bill. Sun protection.',
                'categorySlug' => 'accessories',
                'status' => 'validated',
                'specifications' => [
                    'material' => 'organic cotton front, polyester mesh back',
                    'adjustable' => true,
                    'adjustment_type' => 'snapback',
                    'bill_type' => 'curved',
                    'upf_rating' => 30,
                    'one_size_fits_most' => true,
                    'activities' => ['casual', 'hiking', 'lifestyle'],
                    'seasons' => ['spring', 'summer', 'autumn'],
                    'care' => 'spot_clean_only'
                ],
                'variants' => [
                    [
                        'name' => 'Default'
                    ]
                ]
            ],
            [
                'name' => 'Osprey Daylite Plus',
                'brand' => 'Osprey',
                'model' => 'Daylite Plus',
                'weight' => 590,
                'price' => '65.00',
                'description' => '20L daypack with hydration sleeve. Simple and versatile design.',
                'categorySlug' => 'daypacks',
                'status' => 'validated',
                'specifications' => [
                    'capacity_liters' => 20,
                    'hydration_compatible' => true,
                    'hydration_capacity' => '3L',
                    'main_compartments' => 1,
                    'external_pockets' => 3,
                    'laptop_compatible' => false,
                    'compression_straps' => false,
                    'load_lifters' => false,
                    'activities' => ['day_hiking', 'travel', 'everyday'],
                    'torso_range' => 'one_size',
                    'warranty' => 'all_mighty_guarantee'
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'OS_DA_0001',
                    ]
                ]
            ],
            [
                'name' => 'Osprey Atmos AG 65',
                'brand' => 'Osprey',
                'model' => 'Atmos AG 65',
                'description' => 'Anti-Gravity suspension validated for comfort. Popular 65L backpacking pack.',
                'categorySlug' => 'backpacking-packs',
                'status' => 'validated',
                'specifications' => [
                    'capacity_liters' => 65,
                    'suspension_validated' => 'Anti-Gravity AG',
                    'adjustable_torso' => true,
                    'torso_range' => '16-21 inches',
                    'hipbelt_pockets' => 2,
                    'load_lifters' => true,
                    'compression_straps' => 4,
                    'sleeping_bag_compartment' => true,
                    'hydration_compatible' => true,
                    'rain_cover_included' => true,
                    'activities' => ['backpacking', 'trekking'],
                    'warranty' => 'all_mighty_guarantee'
                ],
                'variants' => [
                    [
                        'name' => 'S/M',
                        'weight' => 2092,
                        'price' => '330.00',
                    ],
                    [
                        'name' => 'L/XL',
                        'weight' => 2180,
                        'price' => '330.00',
                        'specifications' => [
                            'capacity_liters' => 68,
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Big Agnes Copper Spur HV UL2',
                'brand' => 'Big Agnes',
                'model' => 'Copper Spur HV UL2',
                'description' => '2-person ultralight tent with high volume design. Excellent livability.',
                'categorySlug' => 'tents',
                'status' => 'validated',
                'specifications' => [
                    'capacity_persons' => 2,
                    'seasons' => 3,
                    'freestanding' => true,
                    'doors' => 2,
                    'vestibules' => 2,
                    'floor_area_sq_ft' => 29,
                    'vestibule_area_sq_ft' => 18,
                    'peak_height_inches' => 40,
                    'pole_material' => 'DAC Featherlite NFL',
                    'fabric' => 'ripstop nylon',
                    'waterproof_rating' => '1200mm',
                    'setup_type' => 'clips_and_sleeves'
                ],
                'variants' => [
                    [
                        'name' => 'Default',
                        'sku' => 'BI_CO_0001',
                        'weight' => 1420,
                        'price' => '620.00',
                    ]
                ]
            ],
            [
                'name' => 'Western Mountaineering UltraLite',
                'brand' => 'Western Mountaineering',
                'model' => 'UltraLite',
                'description' => '20°F down sleeping bag with 850+ fill power. Premium quality.',
                'categorySlug' => 'sleeping-bags',
                'status' => 'validated',
                'specifications' => [
                    'temperature_rating_c' => -7,
                    'fill_type' => 'goose_down',
                    'fill_power' => 850,
                    'shell_fabric' => 'microfiber',
                    'lining_fabric' => 'microfiber',
                    'shape' => 'mummy',
                    'zipper' => 'full_length',
                    'foot_box' => 'shaped',
                    'draft_collar' => true,
                    'stuff_sack_included' => true
                ],
                'variants' => [
                    [
                        'name' => '5\'6" (165cm)',
                        'weight' => 795,
                        'price' => '610.00',
                    ],
                    [
                        'name' => '6\'0" (180cm)',
                        'weight' => 820,
                        'price' => '610.00',
                    ],
                    [
                        'name' => '6\'6" (200cm)',
                        'weight' => 880,
                        'price' => '610.00',
                    ],
                ]
            ],
            [
                'name' => 'Therm-a-Rest NeoAir XLite',
                'brand' => 'Therm-a-Rest',
                'model' => 'NeoAir XLite',
                'description' => 'Ultralight inflatable pad with excellent R-value. Popular choice.',
                'categorySlug' => 'sleeping-pads',
                'status' => 'validated',
                'specifications' => [
                    'r_value' => 4.2,
                    'inflation_type' => 'manual',
                    'depth' => 7.6,
                    'valve_type' => 'WingLock',
                    'seasons' => 3,
                    'insulation' => 'ThermaCapture',
                    'warranty_years' => 'limited_lifetime'
                ],
                'variants' => [
                    [
                        'name' => 'RS',
                        'weight' => 330,
                        'price' => '212.50',
                        'specifications' => [
                            'width' => 168,
                            'height' => 51,
                        ]
                    ],
                    [
                        'name' => 'R',
                        'weight' => 370,
                        'price' => '212.50',
                        'specifications' => [
                            'width' => 183,
                            'height' => 51,
                        ]
                    ],
                    [
                        'name' => 'RW',
                        'weight' => 450,
                        'price' => '229.50',
                        'specifications' => [
                            'width' => 183,
                            'height' => 64,
                        ]
                    ],
                    [
                        'name' => 'L',
                        'weight' => 480,
                        'price' => '246.50',
                        'specifications' => [
                            'width' => 196,
                            'height' => 64,
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Jetboil Flash Cooking System',
                'brand' => 'Jetboil',
                'model' => 'Flash',
                'description' => 'Integrated canister stove validated. Boils water in 100 seconds.',
                'categorySlug' => 'stoves-and-fuel',
                'status' => 'validated',
                'specifications' => [
                    'boil_time_1L' => '100 seconds',
                    'water_capacity_liters' => 1,
                    'fuel_type' => 'isobutane_propane',
                    'ignition' => 'push_button_piezo',
                    'regulator' => true,
                    'heat_exchanger' => true,
                    'wind_shield' => 'integrated',
                    'cup_included' => true,
                    'compatible_accessories' => ['coffee_press', 'pot_support']
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 371,
                        'price' => '144.99'
                    ]
                ]
            ],
            [
                'name' => 'TOAKS Titanium 750ml Pot',
                'brand' => 'TOAKS',
                'model' => 'Titanium 750ml',
                'description' => 'Ultra-lightweight titanium pot. Perfect for solo cooking.',
                'categorySlug' => 'cookware',
                'status' => 'validated',
                'specifications' => [
                    'capacity_ml' => 750,
                    'material' => 'titanium',
                    'lid_included' => true,
                    'handles' => 'foldable',
                    'graduation_marks' => true,
                    'non_stick' => false,
                    'dishwasher_safe' => true,
                    'diameter_mm' => 115,
                    'height_mm' => 95,
                    'compatible_stoves' => 'all_types'
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 103,
                        'price' => '27.95'
                    ]
                ]
            ],
            [
                'name' => 'Hydro Flask Standard Mouth 21oz',
                'brand' => 'Hydro Flask',
                'model' => 'Standard Mouth 21oz',
                'description' => 'Insulated stainless steel water bottle. Keeps drinks cold/hot.',
                'categorySlug' => 'water-bottles',
                'status' => 'validated',
                'specifications' => [
                    'capacity_oz' => 21,
                    'capacity_ml' => 621,
                    'material' => 'stainless_steel',
                    'insulation' => 'double_wall_vacuum',
                    'keeps_cold_hours' => 24,
                    'keeps_hot_hours' => 12,
                    'mouth_diameter' => 'standard',
                    'dishwasher_safe' => false,
                    'bpa_free' => true,
                    'lifetime_warranty' => true
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 340,
                        'price' => '39.95'
                    ]
                ]
            ],
            [
                'name' => 'Sawyer Squeeze Water Filter',
                'brand' => 'Sawyer',
                'model' => 'Squeeze',
                'description' => 'Lightweight hollow fiber filter. Removes bacteria and protozoa.',
                'categorySlug' => 'water-treatment',
                'status' => 'validated',
                'specifications' => [
                    'filtration_type' => 'hollow_fiber',
                    'pore_size_microns' => 0.1,
                    'removes_bacteria' => true,
                    'removes_protozoa' => true,
                    'removes_viruses' => false,
                    'flow_rate' => '1.7L/min',
                    'filter_life_gallons' => 100000,
                    'includes_pouches' => 2,
                    'backwash_capable' => true
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 85,
                        'price' => '37.95'
                    ]
                ]
            ],
            [
                'name' => 'Garmin inReach Mini 2',
                'brand' => 'Garmin',
                'model' => 'inReach Mini 2',
                'description' => 'Satellite communicator for emergency situations. Two-way messaging.',
                'categorySlug' => 'navigation',
                'status' => 'validated',
                'specifications' => [
                    'satellite_network' => 'Iridium',
                    'global_coverage' => true,
                    'two_way_messaging' => true,
                    'sos_capability' => true,
                    'gps_tracking' => true,
                    'battery_life_days' => 14,
                    'waterproof_rating' => 'IPX7',
                    'subscription_required' => true,
                    'smartphone_compatible' => true
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 100,
                        'price' => '399.99'
                    ]
                ]
            ],
            [
                'name' => 'Petzl Actik Core Headlamp',
                'brand' => 'Petzl',
                'model' => 'Actik Core',
                'description' => 'Rechargeable headlamp with 450 lumens. Versatile beam patterns.',
                'categorySlug' => 'lighting',
                'status' => 'validated',
                'specifications' => [
                    'max_lumens' => 450,
                    'beam_distance_meters' => 100,
                    'battery_type' => 'rechargeable_lithium',
                    'battery_life_hours' => 130,
                    'beam_patterns' => ['flood', 'mixed', 'distance'],
                    'red_light' => true,
                    'waterproof_rating' => 'IPX4',
                    'lock_function' => true,
                    'compatible_batteries' => ['core', 'aaa']
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 75,
                        'price' => '59.95'
                    ]
                ]
            ],
            [
                'name' => 'Adventure Medical Kits Ultralight/Watertight .7',
                'brand' => 'Adventure Medical Kits',
                'model' => 'Ultralight .7',
                'description' => 'Compact first aid kit for 1-2 people on day trips.',
                'categorySlug' => 'first-aid',
                'status' => 'validated',
                'specifications' => [
                    'persons_supported' => 2,
                    'trip_duration_days' => 1,
                    'waterproof' => true,
                    'wound_care_items' => 15,
                    'medications_included' => 6,
                    'emergency_items' => 3,
                    'instructions_included' => true,
                    'case_type' => 'dry_bag',
                    'refillable' => true
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 85,
                        'price' => '29.95'
                    ]
                ]
            ],
            [
                'name' => 'Leatherman Signal Multi-Tool',
                'brand' => 'Leatherman',
                'model' => 'Signal',
                'weight' => 212,
                'price' => '119.95',
                'description' => 'Outdoor-focused multi-tool with fire starter and whistle.',
                'categorySlug' => 'tools-and-multi-tools',
                'status' => 'validated',
                'specifications' => [
                    'tools_count' => 19,
                    'blade_length_inches' => 2.73,
                    'plier_type' => 'needle_nose',
                    'fire_starter' => true,
                    'whistle' => true,
                    'saw' => true,
                    'can_opener' => true,
                    'scissors' => true,
                    'warranty_years' => 25,
                    'made_in' => 'USA'
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 85,
                        'price' => '29.95'
                    ]
                ]
            ],
            [
                'name' => 'Black Diamond Distance Carbon Z',
                'brand' => 'Black Diamond',
                'model' => 'Distance Carbon Z',
                'weight' => 340,
                'price' => '169.95',
                'description' => 'Ultra-lightweight carbon fiber trekking poles. Z-fold design.',
                'categorySlug' => 'trekking-poles',
                'status' => 'validated',
                'specifications' => [
                    'material' => 'carbon_fiber',
                    'adjustment_type' => 'fixed_length',
                    'folding_type' => 'z_fold',
                    'collapsed_length_cm' => 37,
                    'extended_length_cm' => 110,
                    'grip_material' => 'cork',
                    'strap_type' => 'padded',
                    'tip_type' => 'carbide',
                    'basket_included' => true,
                    'sold_as' => 'pair'
                ],
                'variants' => [
                    [
                        'name' => 'default',
                        'weight' => 340,
                        'price' => '169.95'
                    ]
                ]
            ]
        ];
    }
}
