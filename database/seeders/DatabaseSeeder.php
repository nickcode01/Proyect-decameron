<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Accommodation;
use App\Models\Troom;
use Illuminate\Database\Seeder;

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
        Hotel::factory(4)->create();
        Room::factory(3)->create();
        Accommodation::factory(6)->create();
        Troom::factory(6)->create();
    }
}
