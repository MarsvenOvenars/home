<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Style;

class IndexController extends Controller
{
    public function index()
    {
        $locations = Location::withCount('homes')
            ->orderBy('name')
            ->get();

        $styles = Style::with('styleinteriors')
            ->withCount('homes')
            ->orderBy('name')
            ->get();

        return view('home.index')
            ->with([
                'locations' => $locations,
                'styles' => $styles,
            ]);
    }
}
