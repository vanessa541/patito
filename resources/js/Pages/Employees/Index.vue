<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    employees: Array
})
</script>

<template>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Lista de Empleados</h1>

            <Link
                href="/employees/create"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
            >
                + Crear empleado
            </Link>
        </div>

        <ul>
            <li 
                v-for="employee in employees" 
                :key="employee.id"
                class="border-b py-2"
            >
                {{ employee.nombre }} - {{ employee.email }}
            </li>
        </ul>
    </div>
</template>


