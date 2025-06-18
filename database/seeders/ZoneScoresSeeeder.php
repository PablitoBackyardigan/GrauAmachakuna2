<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ZoneScore;

class ZoneScoresSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zonescore1 = new ZoneScore();
        $zonescore1->id = 2;
        $zonescore1->zone_id = 1;
        $zonescore1->user_id = 2;
        $zonescore1->score = 10;
        $zonescore1->save();

        $zonescore2 = new ZoneScore();
        $zonescore2->id = 3;
        $zonescore2->zone_id = 2;
        $zonescore2->user_id = 2;
        $zonescore2->score = 6;
        $zonescore2->save();

        $zonescore3 = new ZoneScore();
        $zonescore3->id = 4;
        $zonescore3->zone_id = 7;
        $zonescore3->user_id = 2;
        $zonescore3->score = 8;
        $zonescore3->save();
    }
}
