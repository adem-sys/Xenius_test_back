<?php

namespace App\Http\Controllers;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class OffreEmploiController extends Controller
{
    public function index()
    {
        $offresEmploi = OffreEmploi::all();
        return response()->json(['offresEmploi' => $offresEmploi], 200);
    }

    public function show(OffreEmploi $offreEmploi)
    {
        return response()->json(['offreEmploi' => $offreEmploi], 200);
    }

    public function store(Request $request)
    {
        $offreEmploi = OffreEmploi::create($request->all());
        return response()->json(['offreEmploi' => $offreEmploi], 201);
    }

    public function update(Request $request, OffreEmploi $offreEmploi)
    {
        $offreEmploi->update($request->all());
        return response()->json(['offreEmploi' => $offreEmploi], 200);
    }

    public function destroy(OffreEmploi $offreEmploi)
    {
        $offreEmploi->delete();
        return response()->json(null, 204);
    }
}
