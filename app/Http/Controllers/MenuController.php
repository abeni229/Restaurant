<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Plat;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Categorie::with('plats')->get();
        return view('menu.index', compact('categories'));
    }

    public function categorie($nom)
    {
        $categorie = Categorie::where('nom', $nom)->with('plats')->firstOrFail();
        return view('menu.categorie', compact('categorie'));
    }
}
