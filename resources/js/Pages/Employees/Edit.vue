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
    status: props.employee.status, // 👈 agregado correctamente
})

const submit = () => {
    form.put(`/employees/${props.employee.id}`)
}
</script>

<template>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Editar Empleado</h1>

        <form @submit.prevent="submit" class="space-y-4">

            <input v-model="form.nombre" class="input" placeholder="Nombre" />
            <input v-model="form.telefono" class="input" placeholder="Teléfono" />
            <input v-model="form.email" class="input" placeholder="Email" />

            <input v-model="form.calle" class="input" placeholder="Calle" />
            <input v-model="form.numero" class="input" placeholder="Número" />
            <input v-model="form.colonia" class="input" placeholder="Colonia" />
            <input v-model="form.codigo_postal" class="input" placeholder="Código Postal" />
            <input v-model="form.ciudad" class="input" placeholder="Ciudad" />
            <input v-model="form.estado" class="input" placeholder="Estado" />
            <input v-model="form.pais" class="input" placeholder="País" />

            <input v-model="form.area" class="input" placeholder="Área" />
            <input v-model="form.puesto" class="input" placeholder="Puesto" />
            <input v-model="form.fecha_ingreso" type="date" class="input" />

            <!-- Checkbox de estado -->
            <div class="flex items-center gap-2">
                <input 
                    type="checkbox"
                    v-model="form.status"
                />
                <label>Empleado activo</label>
            </div>

            <div class="flex gap-3 mt-4">
                <button 
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                >
                    Actualizar
                </button>

                <Link 
                    href="/employees"
                    class="bg-gray-500 text-white px-4 py-2 rounded"
                >
                    Cancelar
                </Link>
            </div>

        </form>
    </div>
</template>

<style>
.input {
    @apply w-full border border-gray-300 rounded-lg px-3 py-2;
}
</style>
