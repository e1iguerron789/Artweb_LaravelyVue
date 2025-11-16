<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    etiqueta: Object
});

const form = useForm({
    nombre: props.etiqueta.nombre,
    tipo: props.etiqueta.tipo
});

const submit = () =>
    form.put(`/admin/etiquetas/${props.etiqueta.id}`);
</script>

<template>
    <AdminLayout>

        <h2 class="text-2xl font-bold mb-6">Editar etiqueta</h2>

        <form @submit.prevent="submit" class="space-y-6 max-w-xl">

            <!-- Nombre -->
            <div>
                <label class="font-semibold block">Nombre de la etiqueta</label>
                <input
                    v-model="form.nombre"
                    class="mt-1 w-full p-2 border rounded border-[#D4AF37]"
                    type="text"
                />
                <div v-if="form.errors.nombre" class="text-red-600 text-sm mt-1">
                    {{ form.errors.nombre }}
                </div>
            </div>

            <!-- Tipo -->
            <div>
                <label class="font-semibold block">Tipo</label>
                <select
                    v-model="form.tipo"
                    class="mt-1 w-full p-2 border rounded border-[#D4AF37]"
                >
                    <option value="">Selecciona tipo</option>
                    <option value="disciplina">Disciplina</option>
                    <option value="estilo">Estilo</option>
                    <option value="fandom">Fandom</option>
                    <option value="tecnica">Técnica</option>
                    <option value="tema">Tema</option>
                </select>
                <div v-if="form.errors.tipo" class="text-red-600 text-sm mt-1">
                    {{ form.errors.tipo }}
                </div>
            </div>

            <!-- Botones -->
            <div class="flex gap-3">
                <Link
                    href="/admin/etiquetas"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600"
                >
                    Cancelar
                </Link>

                <button
                    type="submit"
                    class="px-4 py-2 bg-[#D4AF37] text-[#0B132B] rounded hover:bg-[#c09a2f]"
                    :disabled="form.processing"
                >
                    Guardar cambios
                </button>
            </div>

        </form>

    </AdminLayout>
</template>

