<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const props = defineProps({
    employee: Object
})

const form = useForm({
    nombre: props.employee.nombre,
    telefono: props.employee.telefono,
    email: props.employee.email,
    calle: props.employee.calle,
    numero: props.employee.numero,
    colonia: props.employee.colonia,
    codigo_postal: props.employee.codigo_postal,
    ciudad: props.employee.ciudad,
    estado: props.employee.estado,
    pais: props.employee.pais,
    area: props.employee.area,
    puesto: props.employee.puesto,
    fecha_ingreso: props.employee.fecha_ingreso,
})

const submit = () => {
    form.put(`/employees/${props.employee.id}`)
}
</script>

<template>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Editar Empleado</h1>

        <form @submit.prevent="submit" class="space-y-4">
            <input v-model="form.nombre" class="input" />
            <input v-model="form.telefono" class="input" />
            <input v-model="form.email" class="input" />

            <button 
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
            >
                Actualizar
            </button>

            <Link 
                href="/employees"
                class="ml-2 bg-gray-500 text-white px-4 py-2 rounded"
            >
                Cancelar
            </Link>
        </form>
    </div>
</template>

<style>
.input {
    @apply w-full border border-gray-300 rounded-lg px-3 py-2;
}
</style>
