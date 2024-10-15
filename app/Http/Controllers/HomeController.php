<?php

namespace App\Http\Controllers;

use App\Models\Ads;

class HomeController extends Controller
{
    public function home()
    {
        return view("welcome", [
            'ads' => Ads::latest()->with(['user', 'categorie'])->paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ads $ads)
    {
        return view('ads.show', [
            'ad' => $ads->load(['user', 'categorie']),
        ]);
    }
}
