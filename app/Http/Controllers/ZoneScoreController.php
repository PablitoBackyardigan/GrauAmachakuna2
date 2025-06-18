<?php

namespace App\Http\Controllers;

use App\Models\ZoneScore;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneScoreController extends Controller
{
    public function store(Request $request, Zone $zone)
    {
        $request->validate([
            'score' => 'required|integer|min:1|max:10',
        ]);

        ZoneScore::updateOrCreate([
            'zone_id' => $zone->id,
            'user_id' => auth()->id(),
        ], [
            'score' => $request->score,
        ]);

        return back()->with('success', 'Puntaje guardado correctamente.');
    }
}
