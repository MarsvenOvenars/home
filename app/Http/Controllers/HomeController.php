<?php

namespace App\Http\Controllers;

use App\Models\Style;
use App\Models\Color;
use App\Models\Location;
use App\Models\User;
use App\Models\Year;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'user' => 'nullable|integer|min:1',
            'location' => 'nullable|integer|min:1',
            'style' => 'nullable|integer|min:1',
            'styleinterior' => 'nullable|integer|min:1',
            'colors' => 'nullable|array|min:0',
            'colors.*' => 'nullable|integer|min:1',
            'years' => 'nullable|array|min:0',
            'years.*' => 'nullable|integer|min:1',
            'minPrice' => 'nullable|numeric|min:0',
            'maxPrice' => 'nullable|numeric|min:0',
            'hasImage' => 'nullable|boolean',
            'sortBy' => 'nullable|in:youngToOld,lowToHigh,highToLow',
        ]);
        //return $request->all();
        $f_q = $request->has('q') ? $request->q : null;
        $f_user = $request->has('user') ? $request->user : null;
        $f_location = $request->has('location') ? $request->location : null;
        $f_style = $request->has('style') ? $request->style : null;
        $f_styleinterior = $request->has('styleinterior') ? $request->styleinterior : null;
        $f_colors = $request->has('color') ? $request->colors : [];
        $f_years = $request->has('year') ? $request->years: [];
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : null;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : null;
        $f_hasImage = $request->has('hasImage') ? $request->hasImage : 0;
        $f_sortBy = $request->has('sortBy') ? $request->sortBy : null;


        $objs = Home::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%')
                    ->orWhere('body', 'like', '%' . $f_q . '%');
            });
        })
            ->when(isset($f_user), function ($query) use ($f_user) {
                return $query->where('user_id', $f_user);
            })
            ->when(isset($f_location), function ($query) use ($f_location) {
                return $query->where('location_id', $f_location);
            })
            ->when(isset($f_style), function ($query) use ($f_style) {
                return $query->where('style_id', $f_style);
            })
            ->when(isset($f_styleinterior), function ($query) use ($f_styleinterior) {
                return $query->where('styleinterior_id', $f_styleinterior);
            })
            ->when(count($f_colors) > 0, function ($query) use ($f_colors) {
                return $query->whereIn('color_id', $f_colors);
            })
            ->when(count($f_years) > 0, function ($query) use ($f_years) {
                return $query->whereIn('year_id', $f_years);
            })
            ->when(isset($f_minPrice), function ($query) use ($f_minPrice) {
                return $query->where('price', '>=', $f_minPrice);
            })
            ->when(isset($f_maxPrice), function ($query) use ($f_maxPrice) {
                return $query->where('price', '<=', $f_maxPrice);
            })

            ->with('user', 'location', 'style', 'styleinterior', 'color', 'year')
            ->when(isset($f_sortBy), function ($query) use ($f_sortBy) {
                if ($f_sortBy == 'lowToHigh') {
                    return $query->orderBy('price');
                } elseif ($f_sortBy == 'highToLow') {
                    return $query->orderBy('price', 'desc');
                } else {
                    return $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                return $query->orderBy('id', 'desc'); // desc => Z-A, asc => A-Z
            })
            ->paginate(40)
            ->withQueryString();

        $users = User::withCount('homes')
            ->orderBy('name')
            ->get();
        $location = Location::withCount('homes')
            ->orderBy('name')
            ->get();
        $style = Style::with('styleinteriors')
            ->withCount('homes')
            ->orderBy('name')
            ->get();
        $colors = Color::withCount('homes')
            ->orderBy('name')
            ->get();
        $years = Year::withCount('homes')
            ->orderBy('name')
            ->get();


return view('homes.index')
            ->with([
                'objs' => $objs,
                'users' => $users,
                'locations' => $locations,
                'styles' => $styles,
                'colors' => $colors,
                'years' => $years,
                'f_q' => $f_q,
                'f_user' => $f_user,
                'f_location' => $f_location,
                'f_style' => $f_style,
                'f_styleinterior' => $f_styleinterior,
                'f_colors' => $f_colors,
                'f_years' => $f_years,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                'f_hasImage' => $f_hasImage,
                'f_sortBy' => $f_sortBy,
            ]);
    }


    public function show($id)
    {
        $obj = Home::findOrFail($id);

        return view('homes.show')
            ->with([
                'obj' => $obj,
            ]);
    }
}
