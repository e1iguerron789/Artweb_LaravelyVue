<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    etiquetas: Array
});
</script>

<template>
    <AdminLayout>

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Etiquetas</h2>

            <Link
                href="/admin/etiquetas/create"
                class="px-4 py-2 bg-[#D4AF37] text-[#0B132B] rounded hover:bg-[#c09a2f]"
            >
                + Nueva etiqueta
            </Link>
        </div>

        <table class="w-full border border-[#D4AF37] bg-[#F5F5DC] text-[#0B132B]">
            <thead class="bg-[#D4AF37]/20 border-b border-[#D4AF37]">
                <tr>
                    <th class="p-3 border-r border-[#D4AF37]">Nombre</th>
                    <th class="p-3 border-r border-[#D4AF37]">Tipo</th>
                    <th class="p-3">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="et in etiquetas"
                    :key="et.id"
                    class="border-t border-[#D4AF37]"
                >
                    <td class="p-3 border-r border-[#D4AF37]">
                        {{ et.nombre }}
                    </td>

                    <td class="p-3 border-r border-[#D4AF37] capitalize">
                        {{ et.tipo }}
                    </td>

                    <td class="p-3 flex gap-3">
                        <Link
                            :href="`/admin/etiquetas/${et.id}/edit`"
                            class="px-3 py-1 bg-[#D4AF37] text-[#0B132B] rounded hover:bg-[#c09a2f]"
                        >
                            Editar
                        </Link>

                        <Link
                            as="button"
                            method="delete"
                            :href="`/admin/etiquetas/${et.id}`"
                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                        >
                            Eliminar
                        </Link>
                    </td>
                </tr>

                <tr v-if="etiquetas.length === 0">
                    <td colspan="3" class="p-4 text-center text-gray-600">
                        No hay etiquetas registradas.
                    </td>
                </tr>
            </tbody>
        </table>

    </AdminLayout>
</template>
