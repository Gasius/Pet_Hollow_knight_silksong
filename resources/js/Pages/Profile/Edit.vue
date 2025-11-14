<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import Navbar from "@/Components/Navbar.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <div class="relative">
        <Navbar/>
        <div class="bg-gray-800/50 backdrop-blur-[5px] p-6 rounded-[30px] shadow-lg max-w-3xl mx-auto w-11/12 md:w-1/2 mt-[100px] mb-[40px]">
            <UpdateProfileInformationForm
                :must-verify-email="mustVerifyEmail"
                :status="status"
                class="max-w-xl"
            />
            <UpdatePasswordForm class="max-w-xl pt-5" />
            <DeleteUserForm class="max-w-xl pt-5" />
        </div>
    </div>
</template>
