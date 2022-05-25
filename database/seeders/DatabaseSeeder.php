<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Billing;
use App\Models\CategoryRmb;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // Billing::create(['name' => 'Bronze', 'price'=>999, 'created_at'=>now()]);
        // Billing::create(['name' => 'Silver', 'price'=>1999, 'created_at'=>now()]);
        // Billing::create(['name' => 'Gold', 'price'=>2999, 'created_at'=>now()]);
        
        // User::factory(10)->create();
        // CategoryRmb::factory(50)->create();
        // Category::factory(10)->create();
        // Product::factory(100)->create();
        // Tag::factory(15)->create();

        // for($i=1; $i<112; $i++) {
        //     DB::table('product_tag')->insert([
        //         'product_id' => $i,
        //         'tag_id' => rand(1,15)
        //     ]);
        // }

        // $this->call([
        //     PostSeeder::class,
        //     CommentSeeder::class,
        // ]);

        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            ShopSeeder::class,
        ]);
    
    }
}
