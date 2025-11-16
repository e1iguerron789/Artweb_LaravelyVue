<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';


defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    intereses: Object,
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>



<!-- Sección: Mis Intereses Artísticos -->
<div class="mt-10 bg-[#F5F5DC] border border-[#D4AF37] shadow-lg rounded-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">🎨 Mis intereses artísticos</h2>

    <!-- Si NO tiene intereses -->
    <div v-if="!intereses">
        <p class="text-gray-700 mb-4">
            Aún no has completado tus intereses artísticos.
            Esto nos ayudará a personalizar tu experiencia 🎯
        </p>

        <Link
            :href="route('intereses.create')"
            class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-[#b8922e] transition"
        >
            Completar ahora
        </Link>
    </div>

    <!-- Si SÍ tiene intereses -->
    <div v-else>
        <div class="space-y-2">
            <p><strong>Edad:</strong> {{ intereses.edad ?? 'No especificado' }}</p>
            <p><strong>Estilo artístico:</strong> {{ intereses.estilo_artistico }}</p>
            <p><strong>Fandom favorito:</strong> {{ intereses.fandom_favorito }}</p>
            <p><strong>Nivel de artista:</strong> {{ intereses.nivel_artista }}</p>
            <p><strong>Descripción:</strong> {{ intereses.descripcion }}</p>
        </div>

        <div class="mt-4">
            <Link
                :href="route('intereses.edit', intereses.id)"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
            >
                Editar
            </Link>
        </div>
       <div class="mt-2">
  <Link
    as="button"
    method="delete"
    :href="route('intereses.destroy', intereses.id)"
    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition"
    onclick="return confirm('¿Seguro que deseas eliminar tus intereses? Esta acción no se puede deshacer.');"
  >
    Eliminar intereses
  </Link>
</div>



    </div>
</div>


                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
