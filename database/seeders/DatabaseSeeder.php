<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Billing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Billing::create(['name' => 'Bronze', 'price'=>999, 'created_at'=>now()]);
        Billing::create(['name' => 'Silver', 'price'=>1999, 'created_at'=>now()]);
        Billing::create(['name' => 'Gold', 'price'=>2999, 'created_at'=>now()]);
    }
}
