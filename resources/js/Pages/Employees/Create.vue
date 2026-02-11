<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    nombre: '',
    telefono: '',
    email: '',
    calle: '',
    numero: '',
    colonia: '',
    codigo_postal: '',
    ciudad: '',
    estado: '',
    pais: '',
    area: '',
    puesto: '',
    fecha_ingreso: '',
})

const submit = () => {
    form.post('/employees')
}
</script>

<template>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Crear Empleado</h1>

        <form @submit.prevent="submit" class="space-y-4">

            <input v-model="form.nombre" type="text" placeholder="Nombre" class="input" />
            <input v-model="form.telefono" type="text" placeholder="Teléfono" class="input" />
            <input v-model="form.email" type="email" placeholder="Email" class="input" />

            <input v-model="form.calle" type="text" placeholder="Calle" class="input" />
            <input v-model="form.numero" type="text" placeholder="Número" class="input" />
            <input v-model="form.colonia" type="text" placeholder="Colonia" class="input" />
            <input v-model="form.codigo_postal" type="text" placeholder="Código Postal" class="input" />
            <input v-model="form.ciudad" type="text" placeholder="Ciudad" class="input" />
            <input v-model="form.estado" type="text" placeholder="Estado" class="input" />
            <input v-model="form.pais" type="text" placeholder="País" class="input" />

            <input v-model="form.area" type="text" placeholder="Área" class="input" />
            <input v-model="form.puesto" type="text" placeholder="Puesto" class="input" />
             <label class="block text-sm font-medium text-gray-700 mb-1">
            Fecha de ingreso
            </label>
            <input v-model="form.fecha_ingreso" type="date" class="input" />

            <div class="flex gap-3 mt-6">
                <button 
                    type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg shadow"
                >
                    Guardar
                </button>

                <Link 
                    href="/employees"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow"
                >
                    Cancelar
                </Link>
            </div>

        </form>
    </div>
</template>

<style>
.input {
    @apply w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200;
}
</style>

