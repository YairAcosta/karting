<?php

namespace App\Http\Controllers;

use App\Models\Karting;
use App\Http\Requests\GuardarKartingRequest;

class KartingController extends Controller
{
    public function index()
{
    $kartings = Karting::all();
    return view('kartings.index', compact('kartings'));
}

    public function create()
    {
        return view('kartings.create');
    }

    public function store(GuardarKartingRequest $request)
    {
        Karting::create($request->validated());
        return redirect()->route('kartings.index')->with('exito', 'Karting creado correctamente.');
    }

    public function edit(Karting $karting)
    {
        return view('kartings.edit', compact('karting'));
    }

    public function update(GuardarKartingRequest $request, Karting $karting)
    {
        $karting->update($request->validated());
        return redirect()->route('kartings.index')->with('exito', 'Karting actualizado correctamente.');
    }

    public function destroy(Karting $karting)
    {
        $karting->delete();
        return redirect()->route('kartings.index')->with('exito', 'Karting eliminado correctamente.');
    }
}
