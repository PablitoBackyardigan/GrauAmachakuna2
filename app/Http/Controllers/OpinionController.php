<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index(Request $request)
    {
        //
    }   

    public function store(Request $request)
    {
        $opinion = new Opinion();

        $opinion->opiniontext = $request->opiniontext;
        $opinion->estrellas = $request->estrellas;
        $opinion->usuario_id = auth()->id();

        $opinion->save();

        return redirect()->route('home');
    } 
}
