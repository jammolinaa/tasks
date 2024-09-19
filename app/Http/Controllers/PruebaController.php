<?php

namespace App\Http\Controllers;

use App\Models\prueba;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pruebas = Prueba::all();
        return view('pruebas.index', compact('pruebas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pruebas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required|numeric',
        ]);
    
        prueba::create($request->all());
    
        return redirect()->route('pruebas.index')->with('success', 'pruebas creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prueba $prueba)
    {
        return view('pruebas.edit',compact('prueba'));
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prueba $prueba)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required|numeric',
        ]);
    
        $prueba->update($request->all());
    
        return redirect()->route('pruebas.index')->with('success', 'pruebas creado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prueba $prueba)
    {
        $prueba->delete();
        return redirect()->route('pruebas.index')->with('success', 'prueba eliminado con éxito');

    }
}
