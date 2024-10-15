<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ads.index', [
            'ads' => Ads::where('user_id', auth()->user()->id)->paginate(10)->sortByDesc('created_at'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'ads.create',
            [
                'categories' => Categorie::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200|string',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string',
        ]);

        $ads = new Ads();
        $ads->title = $request->title;
        $ads->description = $request->description;
        $ads->price = $request->price;
        $ads->status = $request->status;
        $ads->location = $request->location;
        $ads->category_id = $request->category_id;
        $ads->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $ads->image = $name;
        }

        $ads->save();

        return redirect()->route('ads.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ads $ads)
    {
        return view('ads.show', [
            'ad' => $ads->load(['user', 'categorie'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ads)
    {
        Gate::allowif(auth()->user()->id == Ads::find($ads)->user_id, 'Ceci n\'est pas votre annonce. Veuillez vous connecter avec le bon compte.');
        $ads = Ads::find($ads)->with('categorie')->where('user_id', auth()->id())->first();
        return view('ads.edit', [
            'ad' => $ads,
            'categories' => Categorie::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ads)
    {
        $request->validate([
            'title' => 'required|max:200|string',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string',
        ]);

        $ads = Ads::findOrFail($ads);

        Gate::allowif(auth()->user()->id == $ads->user_id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            unlink($destinationPath . '/' . $ads->image);
            $image->move($destinationPath, $name);
            $ads->image = $name;
        }

        $ads->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'image' => $ads->image,
        ]);

        // dd($request->category_id);

        $ads->category_id = $request->category_id;

        $ads->save();

        // dd($ads->category_id);

        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ads)
    {
        $ads = Ads::findOrFail($ads);
        Gate::allowif(auth()->user()->id == $ads->user_id);

        $ads->delete();

        return redirect()->route('ads.index');
    }

    /**
     * Search for ads.
     */
    public function search(Request $request)
    {
        if(!$request->has('category_id') && !$request->has('min') && !$request->has('max') && !$request->has('search') && !$request->has('status') && !$request->has('location')) {
            return redirect()->route('ads.index');
        }
        $ads = Ads::query();

        if ($request->has('category_id')) {
            $ads->where('category_id', $request->category_id);
        }

        if ($request->has('min') && $request->has('max')) {
            $ads->orWhereBetween('price', [$request->min, $request->max]);
        }

        if ($request->has('search')) {
            $ads->orWhere('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $ads->orWhere('status', $request->status);
        }

        if ($request->has('location')) {
            $ads->orWhere('location', $request->location);
        }

        return view('ads.search', [
            'results' => $ads->with(['categorie', 'user'])->paginate(10),
            'categories' => Categorie::all(),
        ]);
    }
}
