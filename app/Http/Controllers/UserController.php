<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use \PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\CV;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user], 200);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json(['user' => $user], 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['user' => $user], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

    public function enregistrerCV(Request $request)
    {
        $request->validate([
            'experience' => 'required|string',
            'competences' => 'required|string',
            'formation' => 'required|string',
            'autres_informations' => 'required|string',
        ]);
    
        $user = $request->user();
        $data = [
            'user_id' => $user->id,
            'experience' => $request->experience,
            'competences' => $request->competences,
            'formation' => $request->formation,
            'autres_informations' =>  $request->autres_informations,
        ];

        $pdf = PDF::loadView('layout', $data);

        $fileName = 'cv_' . uniqid() . '_' . time() . '.pdf';

        $filePath = Storage::disk('public')->put('pdf', $pdf->output());

        $basePath = storage_path('app/public/pdf');
        $path = $basePath . '/' . $fileName;

        $cv = CV::updateOrCreate(
            ['user_id' => $user->id],
            [
                'experience' => $request->experience,
                'competences' => $request->competences,
                'formation' => $request->formation,
                'autres_informations' => $request->autres_informations,
                'cv_path' => $path,
            ]
        );
        
        return response()->json(['message' => 'CV enregistré avec succès']);
    }

}
