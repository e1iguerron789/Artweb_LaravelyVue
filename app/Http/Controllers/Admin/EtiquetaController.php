<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function index()
    {
        return inertia('Admin/Etiquetas/Index', [
            'etiquetas' => Etiqueta::all()
        ]);
    }

    public function create()
    {
        return inertia('Admin/Etiquetas/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|in:disciplina,estilo,tema',
        ]);

        Etiqueta::create($request->all());

        return redirect()->route('admin.etiquetas.index')
            ->with('success', 'Etiqueta creada correctamente');
    }

    public function edit(Etiqueta $etiqueta)
    {
        return inertia('Admin/Etiquetas/Edit', [
            'etiqueta' => $etiqueta
        ]);
    }

    public function update(Request $request, Etiqueta $etiqueta)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|in:disciplina,estilo,tema',
        ]);

        $etiqueta->update($request->all());

        return redirect()->route('admin.etiquetas.index')
            ->with('success', 'Etiqueta actualizada correctamente');
    }

    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();

        return redirect()->route('admin.etiquetas.index')
            ->with('success', 'Etiqueta eliminada correctamente');
    }
}
