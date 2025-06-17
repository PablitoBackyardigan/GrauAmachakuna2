<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GanadoresController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        // Rangos de fechas
        $startOfWeek = $now->copy()->startOfWeek();
        $endOfWeek = $now->copy()->endOfWeek();

        $startLastWeek = $now->copy()->subWeek()->startOfWeek();
        $endLastWeek = $now->copy()->subWeek()->endOfWeek();

        // 🏆 Top 3 zonas de la semana actual
        $topZonasSemanaActual = Zone::join('zone_scores', 'zones.id', '=', 'zone_scores.zone_id')
            ->whereBetween('zone_scores.created_at', [$startOfWeek, $endOfWeek])
            ->select('zones.id', 'zones.name', 'zones.color', DB::raw('AVG(zone_scores.score) as promedio'))
            ->groupBy('zones.id', 'zones.name', 'zones.color')
            ->orderByDesc('promedio')
            ->take(3)
            ->get();

        // 🥈 Top 3 zonas de la semana pasada
        $topZonasSemanaPasada = Zone::join('zone_scores', 'zones.id', '=', 'zone_scores.zone_id')
            ->whereBetween('zone_scores.created_at', [$startLastWeek, $endLastWeek])
            ->select('zones.id', 'zones.name', 'zones.color', DB::raw('AVG(zone_scores.score) as promedio'))
            ->groupBy('zones.id', 'zones.name', 'zones.color')
            ->orderByDesc('promedio')
            ->take(3)
            ->get();

        return view('ganadores.index', compact(
            'topZonasSemanaActual',
            'topZonasSemanaPasada'
        ));
    }
}
