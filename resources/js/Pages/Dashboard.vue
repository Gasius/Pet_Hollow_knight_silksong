<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Navbar from "@/Components/Navbar.vue";
</script>

<template>
    <div class="relative min-h-screen pt-16">
        <Navbar />
        <div class="bg-gray-800/50 backdrop-blur-[5px] p-6 rounded-[30px] shadow-lg max-w-3xl mx-auto w-11/12 md:w-1/2 mt-[200px] mb-[40px]">
            <h1 class="text-3xl font-bold text-center text-white/80">Вы вошли в профиль!</h1>
        </div>
    </div>
</template>
