<?php

namespace App\DataFixtures\Data;

class ItemData
{
    public static function getItems(): array
    {
        return [
            [
                'name' => 'Patagonia Houdini Windbreaker',
                'brand' => 'Patagonia',
                'model' => 'Houdini',
                'weight' => 95,
                'price' => '99.00',
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
                ]
            ],
            [
                'name' => 'Arc\'teryx Atom LT Vest',
                'brand' => 'Arc\'teryx',
                'model' => 'Atom LT',
                'weight' => 270,
                'price' => '229.00',
                'description' => 'Synthetic insulated vest for core warmth. Coreloft insulation retains warmth when wet.',
                'categorySlug' => 'jackets',
                'status' => 'validated'
            ],
            [
                'name' => 'Outdoor Research Ferrosi Jacket',
                'brand' => 'Outdoor Research',
                'model' => 'Ferrosi',
                'weight' => 340,
                'price' => '179.00',
                'description' => 'Breathable softshell jacket with wind and light precipitation protection.',
                'categorySlug' => 'jackets',
                'status' => 'validated'
            ],
            [
                'name' => 'Montbell Plasma 1000 Down Jacket',
                'brand' => 'Montbell',
                'model' => 'Plasma 1000',
                'weight' => 190,
                'price' => '349.00',
                'description' => 'Ultralight down jacket with 1000-fill power goose down. Excellent warmth-to-weight ratio.',
                'categorySlug' => 'jackets',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Rain Jacket',
                'brand' => 'REI Co-op',
                'model' => 'Essential Rain',
                'weight' => 425,
                'price' => '79.95',
                'description' => 'Waterproof breathable rain jacket with sealed seams. Budget-friendly protection.',
                'categorySlug' => 'jackets',
                'status' => 'validated'
            ],
            [
                'name' => 'Patagonia Houdini Snap-T Pants',
                'brand' => 'Patagonia',
                'model' => 'Houdini Snap-T',
                'weight' => 240,
                'price' => '129.00',
                'description' => 'Lightweight wind pants that pack small. Side snaps for easy on/off over boots.',
                'categorySlug' => 'pants',
                'status' => 'validated'
            ],
            [
                'name' => 'Prana Stretch Zion Pants',
                'brand' => 'Prana',
                'model' => 'Stretch Zion',
                'weight' => 380,
                'price' => '89.00',
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
                ]
            ],
            [
                'name' => 'Outdoor Research Ferrosi Pants',
                'brand' => 'Outdoor Research',
                'model' => 'Ferrosi',
                'weight' => 290,
                'price' => '139.00',
                'description' => 'Breathable softshell pants with articulated knees and gusseted crotch.',
                'categorySlug' => 'pants',
                'status' => 'validated'
            ],
            [
                'name' => 'Patagonia Baggies Shorts 5"',
                'brand' => 'Patagonia',
                'model' => 'Baggies 5"',
                'weight' => 155,
                'price' => '55.00',
                'description' => 'Quick-dry nylon shorts with liner. Classic hiking and swimming shorts.',
                'categorySlug' => 'pants',
                'status' => 'validated'
            ],
            [
                'name' => 'Arc\'teryx Gamma LT Pants',
                'brand' => 'Arc\'teryx',
                'model' => 'Gamma LT',
                'weight' => 455,
                'price' => '299.00',
                'description' => 'Technical softshell pants for alpine conditions. Durable and breathable.',
                'categorySlug' => 'pants',
                'status' => 'validated'
            ],
            [
                'name' => 'Smartwool Merino 150 Base Layer',
                'brand' => 'Smartwool',
                'model' => 'Merino 150',
                'weight' => 140,
                'price' => '75.00',
                'description' => 'Lightweight merino wool base layer. Natural odor resistance and moisture management.',
                'categorySlug' => 'tops',
                'status' => 'validated',
                'specifications' => [
                    'material' => '87% merino wool, 13% nylon',
                    'fabric_weight' => '150 gsm',
                    'odor_resistant' => true,
                    'moisture_wicking' => true,
                    'temperature_regulation' => true,
                    'upf_rating' => 25,
                    'flatlock_seams' => true,
                    'activities' => ['hiking', 'running', 'layering'],
                    'seasons' => ['spring', 'summer', 'autumn', 'winter'],
                    'care' => 'machine_wash_cold'
                ]
            ],
            [
                'name' => 'Patagonia Capilene Cool Daily Shirt',
                'brand' => 'Patagonia',
                'model' => 'Capilene Cool Daily',
                'weight' => 120,
                'price' => '45.00',
                'description' => 'Recycled polyester hiking shirt with HeiQ Fresh odor control.',
                'categorySlug' => 'tops',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Merino Wool Long-Sleeve',
                'brand' => 'REI Co-op',
                'model' => 'Merino Wool LS',
                'weight' => 190,
                'price' => '69.95',
                'description' => 'Comfortable merino wool long-sleeve for layering. Natural temperature regulation.',
                'categorySlug' => 'tops',
                'status' => 'validated'
            ],
            [
                'name' => 'Outdoor Research Echo Long Sleeve Tee',
                'brand' => 'Outdoor Research',
                'model' => 'Echo LS',
                'weight' => 135,
                'price' => '55.00',
                'description' => 'Sun protection tee with UPF 15. Soft and comfortable for long hikes.',
                'categorySlug' => 'tops',
                'status' => 'validated'
            ],
            [
                'name' => 'Icebreaker Tech Lite SS Crewe',
                'brand' => 'Icebreaker',
                'model' => 'Tech Lite SS',
                'weight' => 125,
                'price' => '70.00',
                'description' => 'Classic merino wool t-shirt. Naturally odor-resistant and comfortable.',
                'categorySlug' => 'tops',
                'status' => 'validated'
            ],
            [
                'name' => 'Patagonia R1 Daily Jacket',
                'brand' => 'Patagonia',
                'model' => 'R1 Daily',
                'weight' => 365,
                'price' => '149.00',
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
                ]
            ],
            [
                'name' => 'Arc\'teryx Kyanite Hoody',
                'brand' => 'Arc\'teryx',
                'model' => 'Kyanite',
                'weight' => 415,
                'price' => '179.00',
                'description' => 'Warm fleece hoody for cool weather hiking. Polartec Power Stretch Pro.',
                'categorySlug' => 'fleece',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Fleece Jacket',
                'brand' => 'REI Co-op',
                'model' => 'Fleece Jacket',
                'weight' => 450,
                'price' => '59.95',
                'description' => 'Classic fleece jacket for cool weather. Good value and warmth.',
                'categorySlug' => 'fleece',
                'status' => 'validated'
            ],
            [
                'name' => 'Outdoor Research Vigor Fleece Hoody',
                'brand' => 'Outdoor Research',
                'model' => 'Vigor',
                'weight' => 380,
                'price' => '125.00',
                'description' => 'Grid fleece hoody for active use. Great warmth-to-weight ratio.',
                'categorySlug' => 'fleece',
                'status' => 'validated'
            ],
            [
                'name' => 'Patagonia Better Sweater Vest',
                'brand' => 'Patagonia',
                'model' => 'Better Sweater',
                'weight' => 320,
                'price' => '99.00',
                'description' => 'Classic fleece vest with sweater-knit face fabric. Casual and warm.',
                'categorySlug' => 'fleece',
                'status' => 'validated'
            ],
            [
                'name' => 'Smartwool PhD Seamless Boxer Brief',
                'brand' => 'Smartwool',
                'model' => 'PhD Seamless',
                'weight' => 65,
                'price' => '40.00',
                'description' => 'Merino wool boxer briefs with seamless construction. Chafe-free comfort.',
                'categorySlug' => 'underwear',
                'status' => 'validated',
                'specifications' => [
                    'material' => '56% merino wool, 39% nylon, 5% elastane',
                    'seamless_construction' => true,
                    'odor_resistant' => true,
                    'moisture_wicking' => true,
                    'chafe_free' => true,
                    'inseam_length' => '6 inches',
                    'activities' => ['hiking', 'running', 'travel'],
                    'seasons' => ['all_season'],
                    'care' => 'machine_wash_cold'
                ]
            ],
            [
                'name' => 'ExOfficio Give-N-Go 2.0 Boxer Brief',
                'brand' => 'ExOfficio',
                'model' => 'Give-N-Go 2.0',
                'weight' => 55,
                'price' => '28.00',
                'description' => 'Quick-dry antimicrobial underwear. Perfect for multi-day trips.',
                'categorySlug' => 'underwear',
                'status' => 'validated'
            ],
            [
                'name' => 'Patagonia Capilene Air Bottoms',
                'brand' => 'Patagonia',
                'model' => 'Capilene Air',
                'weight' => 115,
                'price' => '79.00',
                'description' => 'Lightweight merino wool base layer bottoms. Soft and breathable.',
                'categorySlug' => 'underwear',
                'status' => 'validated'
            ],
            [
                'name' => 'Icebreaker Anatomica Briefs',
                'brand' => 'Icebreaker',
                'model' => 'Anatomica',
                'weight' => 45,
                'price' => '35.00',
                'description' => 'Merino wool briefs with body-mapped construction. Natural comfort.',
                'categorySlug' => 'underwear',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Merino Wool Long Underwear',
                'brand' => 'REI Co-op',
                'model' => 'Merino Long Underwear',
                'weight' => 195,
                'price' => '59.95',
                'description' => 'Merino wool long underwear for cold weather layering.',
                'categorySlug' => 'underwear',
                'status' => 'validated'
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
                    'material' => '64% merino wool, 32% nylon, 4% lycra spandex',
                    'cushioning' => 'full',
                    'height' => 'boot',
                    'seamless_toe' => true,
                    'odor_resistant' => true,
                    'moisture_wicking' => true,
                    'lifetime_warranty' => true,
                    'activities' => ['hiking', 'backpacking', 'work'],
                    'seasons' => ['all_season'],
                    'made_in' => 'Vermont, USA'
                ]
            ],
            [
                'name' => 'Smartwool PhD Outdoor Light Crew',
                'brand' => 'Smartwool',
                'model' => 'PhD Outdoor Light',
                'weight' => 55,
                'price' => '21.95',
                'description' => 'Light cushion hiking socks with Indestructawool technology.',
                'categorySlug' => 'socks',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Merino Wool Hiking Socks',
                'brand' => 'REI Co-op',
                'model' => 'Merino Hiking',
                'weight' => 65,
                'price' => '16.95',
                'description' => 'Cushioned merino wool hiking socks. Great value option.',
                'categorySlug' => 'socks',
                'status' => 'validated'
            ],
            [
                'name' => 'Balega Hidden Comfort No Show',
                'brand' => 'Balega',
                'model' => 'Hidden Comfort',
                'weight' => 35,
                'price' => '14.99',
                'description' => 'Low-profile running socks with seamless toe construction.',
                'categorySlug' => 'socks',
                'status' => 'validated'
            ],
            [
                'name' => 'Injinji Trail Midweight Crew',
                'brand' => 'Injinji',
                'model' => 'Trail Midweight',
                'weight' => 45,
                'price' => '17.95',
                'description' => 'Five-toe socks prevent blisters between toes. Unique design.',
                'categorySlug' => 'socks',
                'status' => 'validated'
            ],
            [
                'name' => 'Salomon X Ultra 3 GTX',
                'brand' => 'Salomon',
                'model' => 'X Ultra 3 GTX',
                'weight' => 880,
                'price' => '159.95',
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
                ]
            ],
            [
                'name' => 'Merrell Moab 3 Hiking Shoes',
                'brand' => 'Merrell',
                'model' => 'Moab 3',
                'weight' => 850,
                'price' => '119.95',
                'description' => 'Popular all-around hiking shoes. Comfortable right out of the box.',
                'categorySlug' => 'footwear',
                'status' => 'validated'
            ],
            [
                'name' => 'Altra Lone Peak 7',
                'brand' => 'Altra',
                'model' => 'Lone Peak 7',
                'weight' => 640,
                'price' => '139.95',
                'description' => 'Zero-drop trail running shoes with wide toe box. Natural foot shape.',
                'categorySlug' => 'footwear',
                'status' => 'validated'
            ],
            [
                'name' => 'La Sportiva Nucleo High GTX',
                'brand' => 'La Sportiva',
                'model' => 'Nucleo High GTX',
                'weight' => 1150,
                'price' => '229.95',
                'description' => 'Technical hiking boots for rough terrain. Gore-Tex waterproofing.',
                'categorySlug' => 'footwear',
                'status' => 'validated'
            ],
            [
                'name' => 'Teva Universal Trail Sandals',
                'brand' => 'Teva',
                'model' => 'Universal Trail',
                'weight' => 420,
                'price' => '79.95',
                'description' => 'Hiking sandals with Spider Rubber outsole. Great for stream crossings.',
                'categorySlug' => 'footwear',
                'status' => 'validated'
            ],
            [
                'name' => 'Patagonia P-6 Logo Trucker Hat',
                'brand' => 'Patagonia',
                'model' => 'P-6 Logo Trucker',
                'weight' => 85,
                'price' => '35.00',
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
                ]
            ],
            [
                'name' => 'Outdoor Research Sun Runner Cap',
                'brand' => 'Outdoor Research',
                'model' => 'Sun Runner',
                'weight' => 75,
                'price' => '32.00',
                'description' => 'Lightweight cap with UPF 50+ sun protection and quick-dry fabric.',
                'categorySlug' => 'accessories',
                'status' => 'validated'
            ],
            [
                'name' => 'Smartwool PhD HyFi Gloves',
                'brand' => 'Smartwool',
                'model' => 'PhD HyFi',
                'weight' => 45,
                'price' => '45.00',
                'description' => 'Lightweight merino wool gloves with touchscreen compatibility.',
                'categorySlug' => 'accessories',
                'status' => 'validated'
            ],
            [
                'name' => 'Buff Original Multifunctional Headwear',
                'brand' => 'Buff',
                'model' => 'Original',
                'weight' => 25,
                'price' => '20.00',
                'description' => 'Versatile neck gaiter that can be worn 12+ ways. UV protection.',
                'categorySlug' => 'accessories',
                'status' => 'validated'
            ],
            [
                'name' => 'Outdoor Research Crocodile Gaiters',
                'brand' => 'Outdoor Research',
                'model' => 'Crocodile',
                'weight' => 190,
                'price' => '69.00',
                'description' => 'Waterproof gaiters to keep debris out of boots. Durable construction.',
                'categorySlug' => 'accessories',
                'status' => 'validated'
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
                ]
            ],
            [
                'name' => 'Patagonia Black Hole Pack 25L',
                'brand' => 'Patagonia',
                'model' => 'Black Hole 25L',
                'weight' => 680,
                'price' => '129.00',
                'description' => 'Weather-resistant daypack with laptop sleeve. Urban and trail use.',
                'categorySlug' => 'daypacks',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Trail 25 Pack',
                'brand' => 'REI Co-op',
                'model' => 'Trail 25',
                'weight' => 750,
                'price' => '89.95',
                'description' => '25L hiking daypack with ventilated back panel. Great value.',
                'categorySlug' => 'daypacks',
                'status' => 'validated'
            ],
            [
                'name' => 'Deuter Speed Lite 21',
                'brand' => 'Deuter',
                'model' => 'Speed Lite 21',
                'weight' => 460,
                'price' => '70.00',
                'description' => 'Ultra-lightweight daypack for fast hiking. Minimalist design.',
                'categorySlug' => 'daypacks',
                'status' => 'validated'
            ],
            [
                'name' => 'Gregory Maya 22',
                'brand' => 'Gregory',
                'model' => 'Maya 22',
                'weight' => 930,
                'price' => '119.95',
                'description' => 'Women\'s specific daypack with VaporSpan suspension validated.',
                'categorySlug' => 'daypacks',
                'status' => 'validated'
            ],
            [
                'name' => 'Osprey Atmos AG 65',
                'brand' => 'Osprey',
                'model' => 'Atmos AG 65',
                'weight' => 2100,
                'price' => '270.00',
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
                ]
            ],
            [
                'name' => 'Gregory Baltoro 65',
                'brand' => 'Gregory',
                'model' => 'Baltoro 65',
                'weight' => 2380,
                'price' => '279.95',
                'description' => 'Adjustable torso length with Response A3 suspension. Comfortable carry.',
                'categorySlug' => 'backpacking-packs',
                'status' => 'validated'
            ],
            [
                'name' => 'Hyperlite Mountain Gear Southwest 3400',
                'brand' => 'Hyperlite Mountain Gear',
                'model' => 'Southwest 3400',
                'weight' => 794,
                'price' => '350.00',
                'description' => 'Ultralight 55L pack with dyneema fabric. For serious weight savings.',
                'categorySlug' => 'backpacking-packs',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Flash 55',
                'brand' => 'REI Co-op',
                'model' => 'Flash 55',
                'weight' => 1470,
                'price' => '149.95',
                'description' => 'Lightweight pack with removable features. Good value for weight conscious.',
                'categorySlug' => 'backpacking-packs',
                'status' => 'validated'
            ],
            [
                'name' => 'Granite Gear Crown2 60',
                'brand' => 'Granite Gear',
                'model' => 'Crown2 60',
                'weight' => 1134,
                'price' => '200.00',
                'description' => 'Ultralight 60L pack with removable framesheet. Minimalist design.',
                'categorySlug' => 'backpacking-packs',
                'status' => 'validated'
            ],
            [
                'name' => 'Big Agnes Copper Spur HV UL2',
                'brand' => 'Big Agnes',
                'model' => 'Copper Spur HV UL2',
                'weight' => 1400,
                'price' => '429.95',
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
                ]
            ],
            [
                'name' => 'REI Co-op Half Dome SL 2+',
                'brand' => 'REI Co-op',
                'model' => 'Half Dome SL 2+',
                'weight' => 1680,
                'price' => '279.95',
                'description' => 'Spacious 2-person tent with large vestibule. Great value for families.',
                'categorySlug' => 'tents',
                'status' => 'validated'
            ],
            [
                'name' => 'MSR Hubba Hubba NX 2',
                'brand' => 'MSR',
                'model' => 'Hubba Hubba NX 2',
                'weight' => 1540,
                'price' => '449.95',
                'description' => 'Lightweight 2-person tent with dual vestibules. Award-winning design.',
                'categorySlug' => 'tents',
                'status' => 'validated'
            ],
            [
                'name' => 'Zpacks Duplex Tent',
                'brand' => 'Zpacks',
                'model' => 'Duplex',
                'weight' => 510,
                'price' => '699.00',
                'description' => 'Ultra-ultralight 2-person tent using trekking poles. Dyneema fabric.',
                'categorySlug' => 'tents',
                'status' => 'validated'
            ],
            [
                'name' => 'Nemo Hornet Elite 2P',
                'brand' => 'Nemo',
                'model' => 'Hornet Elite 2P',
                'weight' => 990,
                'price' => '499.95',
                'description' => 'Ultralight tent with unique pole structure. Great space efficiency.',
                'categorySlug' => 'tents',
                'status' => 'validated'
            ],
            [
                'name' => 'Western Mountaineering UltraLite',
                'brand' => 'Western Mountaineering',
                'model' => 'UltraLite',
                'weight' => 680,
                'price' => '429.00',
                'description' => '20°F down sleeping bag with 850+ fill power. Premium quality.',
                'categorySlug' => 'sleeping-bags',
                'status' => 'validated',
                'specifications' => [
                    'temperature_rating_f' => 20,
                    'fill_type' => 'goose_down',
                    'fill_power' => 850,
                    'fill_weight_oz' => 19,
                    'shell_fabric' => 'microfiber',
                    'lining_fabric' => 'microfiber',
                    'shape' => 'mummy',
                    'zipper' => 'full_length',
                    'foot_box' => 'shaped',
                    'draft_collar' => true,
                    'stuff_sack_included' => true
                ]
            ],
            [
                'name' => 'REI Co-op Magma 30',
                'brand' => 'REI Co-op',
                'model' => 'Magma 30',
                'weight' => 795,
                'price' => '199.95',
                'description' => '30°F down sleeping bag with 850-fill down. Excellent value.',
                'categorySlug' => 'sleeping-bags',
                'status' => 'validated'
            ],
            [
                'name' => 'Enlightened Equipment Revelation',
                'brand' => 'Enlightened Equipment',
                'model' => 'Revelation 20°F',
                'weight' => 540,
                'price' => '285.00',
                'description' => 'Backpacking quilt validated. Versatile and ultralight design.',
                'categorySlug' => 'sleeping-bags',
                'status' => 'validated'
            ],
            [
                'name' => 'Patagonia 850 Down Sleeping Bag',
                'brand' => 'Patagonia',
                'model' => '850 Down 30°F',
                'weight' => 920,
                'price' => '399.00',
                'description' => 'Responsibly statusd down with excellent loft. Environmental focus.',
                'categorySlug' => 'sleeping-bags',
                'status' => 'validated'
            ],
            [
                'name' => 'Kelty Cosmic 20',
                'brand' => 'Kelty',
                'model' => 'Cosmic 20',
                'weight' => 1135,
                'price' => '159.95',
                'description' => 'Budget-friendly down sleeping bag. Good for beginners.',
                'categorySlug' => 'sleeping-bags',
                'status' => 'validated'
            ],
            [
                'name' => 'Therm-a-Rest NeoAir XLite',
                'brand' => 'Therm-a-Rest',
                'model' => 'NeoAir XLite',
                'weight' => 350,
                'price' => '199.95',
                'description' => 'Ultralight inflatable pad with excellent R-value. Popular choice.',
                'categorySlug' => 'sleeping-pads',
                'status' => 'validated',
                'specifications' => [
                    'r_value' => 4.2,
                    'thickness_inches' => 2.5,
                    'length_inches' => 72,
                    'width_inches' => 20,
                    'packed_size' => '9 x 4 inches',
                    'inflation_type' => 'manual',
                    'valve_type' => 'WingLock',
                    'seasons' => 3,
                    'insulation' => 'ThermaCapture',
                    'warranty_years' => 'limited_lifetime'
                ]
            ],
            [
                'name' => 'NEMO Tensor Insulated',
                'brand' => 'NEMO',
                'model' => 'Tensor Insulated',
                'weight' => 415,
                'price' => '179.95',
                'description' => 'Quiet inflatable pad with Primaloft insulation. Great comfort.',
                'categorySlug' => 'sleeping-pads',
                'status' => 'validated'
            ],
            [
                'name' => 'Sea to Summit Ether Light XT',
                'brand' => 'Sea to Summit',
                'model' => 'Ether Light XT',
                'weight' => 490,
                'price' => '229.95',
                'description' => 'Thick and comfortable inflatable pad. Excellent for side sleepers.',
                'categorySlug' => 'sleeping-pads',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Flash Insulated Pad',
                'brand' => 'REI Co-op',
                'model' => 'Flash Insulated',
                'weight' => 450,
                'price' => '99.95',
                'description' => 'Affordable insulated pad with good warmth. Budget option.',
                'categorySlug' => 'sleeping-pads',
                'status' => 'validated'
            ],
            [
                'name' => 'Therm-a-Rest Z Lite Sol',
                'brand' => 'Therm-a-Rest',
                'model' => 'Z Lite Sol',
                'weight' => 410,
                'price' => '49.95',
                'description' => 'Closed-cell foam pad. Reliable and puncture-proof.',
                'categorySlug' => 'sleeping-pads',
                'status' => 'validated'
            ],
            [
                'name' => 'Jetboil Flash Cooking System',
                'brand' => 'Jetboil',
                'model' => 'Flash',
                'weight' => 371,
                'price' => '109.95',
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
                ]
            ],
            [
                'name' => 'MSR PocketRocket 2',
                'brand' => 'MSR',
                'model' => 'PocketRocket 2',
                'weight' => 73,
                'price' => '49.95',
                'description' => 'Ultra-compact canister stove. Reliable and lightweight.',
                'categorySlug' => 'stoves-and-fuel',
                'status' => 'validated'
            ],
            [
                'name' => 'BRS-3000T Titanium Stove',
                'brand' => 'BRS',
                'model' => '3000T',
                'weight' => 25,
                'price' => '16.95',
                'description' => 'Ultra-ultralight titanium stove. Budget Chinese option.',
                'categorySlug' => 'stoves-and-fuel',
                'status' => 'validated'
            ],
            [
                'name' => 'Soto WindMaster',
                'brand' => 'Soto',
                'model' => 'WindMaster',
                'weight' => 87,
                'price' => '64.95',
                'description' => 'Excellent wind resistance with micro regulator technology.',
                'categorySlug' => 'stoves-and-fuel',
                'status' => 'validated'
            ],
            [
                'name' => 'Optimus Crux Weekend HE',
                'brand' => 'Optimus',
                'model' => 'Crux Weekend HE',
                'weight' => 298,
                'price' => '79.95',
                'description' => 'Heat exchanger stove with integrated pot. Efficient fuel use.',
                'categorySlug' => 'stoves-and-fuel',
                'status' => 'validated'
            ],
            [
                'name' => 'TOAKS Titanium 750ml Pot',
                'brand' => 'TOAKS',
                'model' => 'Titanium 750ml',
                'weight' => 95,
                'price' => '49.95',
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
                ]
            ],
            [
                'name' => 'MSR Trail Lite Duo System',
                'brand' => 'MSR',
                'model' => 'Trail Lite Duo',
                'weight' => 430,
                'price' => '89.95',
                'description' => 'Two-person cookset with hard-anodized aluminum pots.',
                'categorySlug' => 'cookware',
                'status' => 'validated'
            ],
            [
                'name' => 'GSI Outdoors Pinnacle Dualist',
                'brand' => 'GSI Outdoors',
                'model' => 'Pinnacle Dualist',
                'weight' => 620,
                'price' => '119.95',
                'description' => 'Complete two-person cookset with non-stick coating.',
                'categorySlug' => 'cookware',
                'status' => 'validated'
            ],
            [
                'name' => 'Snow Peak Trek 900',
                'brand' => 'Snow Peak',
                'model' => 'Trek 900',
                'weight' => 175,
                'price' => '64.95',
                'description' => 'Titanium mug/pot combo. Minimalist and durable.',
                'categorySlug' => 'cookware',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Lightweight Pot Set',
                'brand' => 'REI Co-op',
                'model' => 'Lightweight Pot Set',
                'weight' => 340,
                'price' => '39.95',
                'description' => 'Budget-friendly aluminum cookset for beginners.',
                'categorySlug' => 'cookware',
                'status' => 'validated'
            ],
            [
                'name' => 'Hydro Flask Standard Mouth 21oz',
                'brand' => 'Hydro Flask',
                'model' => 'Standard Mouth 21oz',
                'weight' => 385,
                'price' => '34.95',
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
                ]
            ],
            [
                'name' => 'Nalgene Wide Mouth 32oz',
                'brand' => 'Nalgene',
                'model' => 'Wide Mouth 32oz',
                'weight' => 175,
                'price' => '12.95',
                'description' => 'Classic hard plastic water bottle. Virtually unbreakable.',
                'categorySlug' => 'water-bottles',
                'status' => 'validated'
            ],
            [
                'name' => 'Smart Water 1L Bottle',
                'brand' => 'Glaceau',
                'model' => 'Smart Water 1L',
                'weight' => 38,
                'price' => '1.99',
                'description' => 'Ultra-lightweight plastic bottle. Popular with ultralight hikers.',
                'categorySlug' => 'water-bottles',
                'status' => 'validated'
            ],
            [
                'name' => 'Platypus SoftBottle 1L',
                'brand' => 'Platypus',
                'model' => 'SoftBottle 1L',
                'weight' => 42,
                'price' => '19.95',
                'description' => 'Collapsible water bottle that rolls up when empty.',
                'categorySlug' => 'water-bottles',
                'status' => 'validated'
            ],
            [
                'name' => 'CNOC Vecto 2L Water Container',
                'brand' => 'CNOC',
                'model' => 'Vecto 2L',
                'weight' => 45,
                'price' => '29.95',
                'description' => 'Lightweight water container for camp use. Stands upright.',
                'categorySlug' => 'water-bottles',
                'status' => 'validated'
            ],
            [
                'name' => 'Sawyer Squeeze Water Filter',
                'brand' => 'Sawyer',
                'model' => 'Squeeze',
                'weight' => 85,
                'price' => '37.95',
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
                ]
            ],
            [
                'name' => 'LifeStraw Personal Water Filter',
                'brand' => 'LifeStraw',
                'model' => 'Personal',
                'weight' => 57,
                'price' => '17.95',
                'description' => 'Emergency water filter straw. Drink directly from status.',
                'categorySlug' => 'water-treatment',
                'status' => 'validated'
            ],
            [
                'name' => 'Katadyn BeFree Water Filter',
                'brand' => 'Katadyn',
                'model' => 'BeFree 1L',
                'weight' => 59,
                'price' => '44.95',
                'description' => 'Fast-flow filter with collapsible bottle. Easy to use.',
                'categorySlug' => 'water-treatment',
                'status' => 'validated'
            ],
            [
                'name' => 'Aquatainer Water Purification Tablets',
                'brand' => 'Aquatainer',
                'model' => 'Purification Tablets',
                'weight' => 25,
                'price' => '8.95',
                'description' => 'Chemical water purification tablets. Backup treatment method.',
                'categorySlug' => 'water-treatment',
                'status' => 'validated'
            ],
            [
                'name' => 'SteriPEN Ultra UV Purifier',
                'brand' => 'SteriPEN',
                'model' => 'Ultra',
                'weight' => 140,
                'price' => '149.95',
                'description' => 'UV light water purifier. Kills viruses, bacteria, and protozoa.',
                'categorySlug' => 'water-treatment',
                'status' => 'validated'
            ],
            [
                'name' => 'Garmin inReach Mini 2',
                'brand' => 'Garmin',
                'model' => 'inReach Mini 2',
                'weight' => 100,
                'price' => '399.99',
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
                ]
            ],
            [
                'name' => 'Suunto MC-2 Compass',
                'brand' => 'Suunto',
                'model' => 'MC-2',
                'weight' => 64,
                'price' => '89.95',
                'description' => 'Precision compass with mirror and clinometer. Navigation essential.',
                'categorySlug' => 'navigation',
                'status' => 'validated'
            ],
            [
                'name' => 'Garmin Fenix 7 GPS Watch',
                'brand' => 'Garmin',
                'model' => 'Fenix 7',
                'weight' => 79,
                'price' => '699.99',
                'description' => 'Multi-sport GPS watch with maps. Long battery life.',
                'categorySlug' => 'navigation',
                'status' => 'validated'
            ],
            [
                'name' => 'Petzl Actik Core Headlamp',
                'brand' => 'Petzl',
                'model' => 'Actik Core',
                'weight' => 75,
                'price' => '59.95',
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
                ]
            ],
            [
                'name' => 'Black Diamond Spot 400 Headlamp',
                'brand' => 'Black Diamond',
                'model' => 'Spot 400',
                'weight' => 86,
                'price' => '39.95',
                'description' => 'Versatile headlamp with proximity and distance modes.',
                'categorySlug' => 'lighting',
                'status' => 'validated'
            ],
            [
                'name' => 'Nitecore NU25 Headlamp',
                'brand' => 'Nitecore',
                'model' => 'NU25',
                'weight' => 28,
                'price' => '44.95',
                'description' => 'Ultra-lightweight USB rechargeable headlamp. Popular with ultralight hikers.',
                'categorySlug' => 'lighting',
                'status' => 'validated'
            ],
            [
                'name' => 'Adventure Medical Kits Ultralight/Watertight .7',
                'brand' => 'Adventure Medical Kits',
                'model' => 'Ultralight .7',
                'weight' => 85,
                'price' => '29.95',
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
                ]
            ],
            [
                'name' => 'REI Co-op Wilderness First Aid Kit',
                'brand' => 'REI Co-op',
                'model' => 'Wilderness First Aid',
                'weight' => 340,
                'price' => '49.95',
                'description' => 'Comprehensive first aid kit for group trips and longer outings.',
                'categorySlug' => 'first-aid',
                'status' => 'validated'
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
                ]
            ],
            [
                'name' => 'Victorinox Huntsman Swiss Army Knife',
                'brand' => 'Victorinox',
                'model' => 'Huntsman',
                'weight' => 97,
                'price' => '39.95',
                'description' => 'Classic Swiss Army knife with essential tools.',
                'categorySlug' => 'tools-and-multi-tools',
                'status' => 'validated'
            ],
            [
                'name' => 'Opinel No. 8 Folding Knife',
                'brand' => 'Opinel',
                'model' => 'No. 8',
                'weight' => 45,
                'price' => '16.95',
                'description' => 'Simple and reliable French folding knife. Classic design.',
                'categorySlug' => 'tools-and-multi-tools',
                'status' => 'validated'
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
                ]
            ],
            [
                'name' => 'Leki Micro Vario Carbon',
                'brand' => 'Leki',
                'model' => 'Micro Vario Carbon',
                'weight' => 480,
                'price' => '149.95',
                'description' => 'Adjustable carbon trekking poles with external locks.',
                'categorySlug' => 'trekking-poles',
                'status' => 'validated'
            ],
            [
                'name' => 'REI Co-op Traverse Trekking Poles',
                'brand' => 'REI Co-op',
                'model' => 'Traverse',
                'weight' => 540,
                'price' => '79.95',
                'description' => 'Adjustable aluminum poles with comfortable grips. Good value.',
                'categorySlug' => 'trekking-poles',
                'status' => 'validated'
            ]
        ];
    }
}
