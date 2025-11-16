<?php

namespace App\Http\Controllers;

use App\Models\UserIntereses;
use App\Models\CategoriaInteres;
use App\Models\OpcionInteres;
use Illuminate\Http\Request;

class UserInteresesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        $intereses = UserIntereses::with('opcion.categoria')
            ->where('user_id', $user->id)
            ->get();

        return inertia('UserIntereses/Index', [
            'intereses' => $intereses
        ]);
    }

    public function create()
    {
        return inertia('UserIntereses/Create', [
            'categorias' => CategoriaInteres::all(),
            'opciones' => OpcionInteres::all(),
        ]);
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'opciones' => 'required|array',
        'opciones.*' => 'exists:opcion_intereses,id',
    ]);

    foreach ($validated['opciones'] as $opcion_id) {
        UserIntereses::create([
            'user_id' => auth()->id(),
            'opcion_interes_id' => $opcion_id,
        ]);
    }

    return redirect()->route('dashboard')
        ->with('success', 'Intereses guardados correctamente.');
}


    public function edit(UserIntereses $userIntereses)
    {
        if ($userIntereses->user_id !== auth()->id()) {
            abort(403);
        }

        return inertia('UserIntereses/Edit', [
            'intereses' => $userIntereses,
            'categorias' => CategoriaInteres::all(),
            'opciones' => OpcionInteres::all(),
        ]);
    }

    public function update(Request $request, UserIntereses $userIntereses)
    {
        if ($userIntereses->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'opcion_interes_id' => 'required|exists:opcion_intereses,id',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $userIntereses->update($validated);

        return redirect()->route('profile.edit')
            ->with('success', 'Intereses actualizados correctamente.');
    }

    public function destroy(UserIntereses $userIntereses)
    {
        if ($userIntereses->user_id !== auth()->id()) {
            abort(403);
        }

        $userIntereses->delete();

        return redirect()->route('profile.edit')
            ->with('success', 'Intereses eliminados correctamente.');
    }
}
