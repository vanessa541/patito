<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Employee extends Model
{
    use HasFactory;

    // Relación empleado -> usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'nombre',
        'telefono',
        'email',
        'calle',
        'numero',
        'colonia',
        'codigo_postal',
        'ciudad',
        'estado',
        'pais',
        'area',
        'puesto',
        'fecha_ingreso',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'fecha_ingreso' => 'date',
    ];
    //trae empleado del usuario autenticado
    public function index()
{
    $employees = Employee::where('user_id', Auth::id())
        ->latest()
        ->get();

    return Inertia::render('Employees/Index', [
        'employees' => $employees
    ]);
}
}

