<script setup>
import { Link, useForm } from '@inertiajs/vue3'

defineProps({
    employees: Array
})

const deleteEmployee = (id) => {
    if (confirm('¿Seguro que deseas eliminar este empleado?')) {
        useForm({}).delete(`/employees/${id}`)
    }
}
</script>

<template>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Lista de Empleados</h1>

            <Link
                href="/employees/create"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition"
            >
                + Crear empleado
            </Link>
        </div>

        <ul class="space-y-3">
        <li 
            v-for="employee in employees" 
            :key="employee.id"
            class="border rounded-lg p-4 flex justify-between items-center shadow-sm"
        >
            <div>
                <strong class="text-lg">{{ employee.nombre }}</strong><br>
                <small class="text-gray-600">{{ employee.email }}</small><br>

                <!-- ESTATUS -->
                <span 
                    :class="employee.status 
                        ? 'bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold'
                        : 'bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold'"
                >
                    {{ employee.status ? 'Activo' : 'Inactivo' }}
                </span>
            </div>

            <div class="flex gap-2">
                <Link
                    :href="`/employees/${employee.id}/edit`"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded"
                >
                    Editar
                </Link>

                <button
                    @click="deleteEmployee(employee.id)"
                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                >
                    Eliminar
                </button>
            </div>
        </li>
    </ul>

    </div>
</template>
