<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
           ['name'=>'Oppo Reno 8 5G',
            'price'=>'25000',
            'category'=>'Electronic',
            'description'=>'6.4 inches
            411 ppi, AMOLED,Octa core
            MediaTek Dimensity 1300 MT,50 MP
            Triple, 50MP + 8MP + 2MP',
            'gallery'=>'https://seller.shoponn.co.in/Item/%20Oppo%20Reno8%205GA.jpg'
            ],

            ['name'=>'Galaxy Watch4',
            'price'=>'29000',
            'category'=>'Smart Watch',
            'description'=>'Operating System - Android,
            Shape - Circular,
            Color - Sapphire,   
            Display Technology -AMOLED Display
            Heart Rate',
            'gallery'=>'https://images.samsung.com/is/image/samsung/p6pim/in/2108/gallery/in-galaxy-watch4-classic-399241-sm-r895fzkainu-481181864?$650_519_PNG$'
            ],

            ['name'=>'Sony BRAVIA KD-43X74 43 Inch LED 4K',
            'price'=>'47000',
            'category'=>'Smart Tv',
            'description'=>'Resolution - 4K, 3840 x 2160 Pixels Pixels,
            Refresh Rate- 60 Hz,
            Sound- Total Speaker output 20 W,
            Connectivity Port - USB Ports -2 & HDMI Ports-2',
            'gallery'=>'https://img5.gadgetsnow.com/gd/images/products/additional/large/g281012_View_2/electronics/televisions/sony-bravia-kd-43x74-43-inch-led-4k-3840-x-2160-pixels-tv.jpg'
            ]
        ]);
    }
}
