<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index()
    {
        $cvs = CV::all();
        return response()->json(['cvs' => $cvs], 200);
    }

    public function show(CV $cv)
    {
        return response()->json(['cv' => $cv], 200);
    }

    public function store(Request $request)
    {
        $cv = CV::create($request->all());
        return response()->json(['cv' => $cv], 201);
    }

    public function update(Request $request, CV $cv)
    {
        $cv->update($request->all());
        return response()->json(['cv' => $cv], 200);
    }

    public function destroy(CV $cv)
    {
        $cv->delete();
        return response()->json(null, 204);
    }

    public function generatePDF($cvId)
    {
        $cv = CV::find($cvId);

        if (!$cv) {
            abort(404);
        }

        $pdf = app('dompdf.wrapper')->loadView('layout', ['cv' => $cv]);

        return $pdf->download('cv.pdf');
    }
}
