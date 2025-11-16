<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    intereses: Array,
});
</script>

<template>
    <div class="p-6 text-white">

        <h1 class="text-xl font-bold mb-4">Mis intereses</h1>

        <!-- Si no tiene intereses -->
        <div v-if="intereses.length === 0">
            <p>No tienes intereses registrados.</p>

            <Link
                href="/intereses/create"
                class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded"
            >
                Agregar intereses
            </Link>
        </div>

        <!-- Si tiene intereses -->
        <div v-else class="space-y-4">

            <Link
                href="/intereses/create"
                class="inline-block px-4 py-2 bg-green-600 text-white rounded mb-4"
            >
                Agregar más intereses
            </Link>

            <div v-for="i in intereses" :key="i.id"
                class="p-4 bg-gray-800 rounded shadow">

                <p><strong>Categoría:</strong> {{ i.opcion.categoria.nombre }}</p>
                <p><strong>Opción:</strong> {{ i.opcion.nombre }}</p>

                <div class="mt-3 flex gap-3">
                    <Link
                        :href="`/intereses/${i.id}/edit`"
                        class="px-3 py-1 bg-blue-600 text-white rounded">
                        Editar
                    </Link>

                    <Link
                        as="button"
                        method="delete"
                        :href="`/intereses/${i.id}`"
                        class="px-3 py-1 bg-red-600 text-white rounded">
                        Eliminar
                    </Link>
                </div>

            </div>

        </div>
    </div>
</template>
