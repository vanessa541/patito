<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar lista de empleados
       $employees = Employee::where('user_id', auth()->id())
        ->latest()
        ->get();

        return Inertia::render('Employees/Index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return Inertia::render('Employees/Create');
    
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
    $validated['user_id'] = auth()->id();
    $validated['status'] = 1;   
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
    public function edit(Employee $employee)
    {   
        // Seguridad: que solo pueda editar sus propios empleados
        if ($employee->user_id !== auth()->id()) {
            abort(403);
        }

        return Inertia::render('Employees/Edit', [
            'employee' => $employee
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        if ($employee->user_id !== auth()->id()) {
        abort(403);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        if ($employee->user_id !== auth()->id()) {
            abort(403);
        }

        $employee->delete();
        return redirect()->route('employees.index');    
    }
}
