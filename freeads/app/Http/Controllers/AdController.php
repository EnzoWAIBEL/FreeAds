<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Requests\AdStore;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /* Index */
    public function index()
    {
        $ads = DB::table('ads')->orderBy('created_at', 'DESC')->simplePaginate(4);
        return view('ads', compact('ads'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(AdStore $request)
    {
        $validated = $request->validated();

            $ad = new Ad();
            $ad->title = $validated['title'];
            $ad->description = $validated['description'];
            $ad->price = $validated['price'];
            $ad->localisation = $validated['localisation'];
            $ad->image = $request->file('image')->store('images', 'public');
            $ad->user_id = auth()->user()->id;
            $ad->save();

        return redirect()->route('home')->with('success', 'Votre annonce a bien été enregistrée');
    }

    public function show($id)
    {
        $ad = Ad::find($id);
        return view('show', compact('ad'));
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('edit', compact('ad'));
    }

    public function update(AdStore $request, $id)
    {
        $validated = $request->validated();

        $ad = Ad::findOrFail($id);
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->price = $validated['price'];
        $ad->localisation = $validated['localisation'];
        $ad->image = $request->file('image')->store('images', 'public');
        $ad->update();

        return redirect()->route('home')->with('success', 'Votre annonce a bien été modifiée');
    }

    public function destroy($id)
    {
        $ad = Ad::find($id);
        $ad->delete();

        return redirect()->route('home')->with('success', 'Votre annonce a bien été supprimée');
    }

    public function search(Request $request)
    {
        $words = $request->words;

        $ads = DB::table('ads')
        ->where('title', 'LIKE', "%$words%")
        ->orWhere('description', 'LIKE', "%$words%")
        ->orWhere('localisation', 'LIKE', "%$words%")
        ->orderBy('created_at', 'DESC')
        ->get();

        return response()->json(['sucess' => true, 'ads' => $ads]);
    }
}
