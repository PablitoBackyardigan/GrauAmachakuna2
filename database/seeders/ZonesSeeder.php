<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zone;

class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zone1 = new Zone();
        $zone1->name = "ZONA 1";
        $zone1->color = "purple";
        $zone1->available = true;
        $zone1->save();

        $zone2 = new Zone();
        $zone2->name = "ZONA 2";
        $zone2->color = "green";
        $zone2->available = true;
        $zone2->save();

        $zone3 = new Zone();
        $zone3->name = "ZONA 3";
        $zone3->color = "green";
        $zone3->available = true;
        $zone3->save();

        $zone4 = new Zone();
        $zone4->name = "ZONA 4";
        $zone4->color = "green";
        $zone4->available = true;
        $zone4->save();

        $zone5 = new Zone();
        $zone5->name = "ZONA 5";
        $zone5->color = "purple";
        $zone5->available = true;
        $zone5->save();

        $zone6 = new Zone();
        $zone6->name = "ZONA 6";
        $zone6->color = "green";
        $zone6->available = true;
        $zone6->save();

        $zone7 = new Zone();
        $zone7->name = "ZONA 7";
        $zone7->color = "purple";
        $zone7->available = true;
        $zone7->save();

        $zone8 = new Zone();
        $zone8->name = "ZONA 8";
        $zone8->color = "green";
        $zone8->available = true;
        $zone8->save();
    }
}
