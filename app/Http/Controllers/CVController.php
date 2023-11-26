<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use \PDF;
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

    public function generatePDF(Request $request)
    { 
        $data = [
            'user_id' => 1,
            'experience' => '+2 Full Stack Developer chez Xsofwtare',
            'competences' => 'php , laravel , vue , angular , springboot ,symfony',
            'formation' => 'bac +5 diplome ingenieur en informatique',
            'autres_informations' => 'certifée depuit google',
        ];

        $pdf = PDF::loadView('layout', $data);

        return $pdf->download('cv.pdf');
    }

}
