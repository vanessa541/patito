<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $validated = $request->validate([
        'nombre' => 'required|string|max:200',
        'telefono' => 'required|string|max:10',
        'email' => 'required|email',
        'calle' => 'required|string',
        'numero' => 'required|string',
        'colonia' => 'required|string',
        'codigo_postal' => 'required|string',
        'ciudad' => 'required|string',
        'estado' => 'required|string',
        'pais' => 'required|string',
        'area' => 'required|string',
        'puesto' => 'required|string',
        'fecha_ingreso' => 'required|date',

    ]);
     $validated['user_id'] = Auth::id();

    Employee::create($validated);

    return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
