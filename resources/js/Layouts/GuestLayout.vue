<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import Navbar from "@/Components/Navbar.vue";
</script>

<template>
    <Navbar />
    <div class=" min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-6 bg-gray-800/50 backdrop-blur-[5px] p-6 rounded-[30px] shadow-lg"
        >
            <slot />
        </div>
    </div>
    <div class="fixed inset-0 bg-[url('https://images.squarespace-cdn.com/content/v1/606d4bb793879d12d807d4c8/1618988252161-50HJPZWN80NSUEDGDHMT/Hornet_banner_wide-1.jpg?format=2500w')] bg-no-repeat bg-cover bg-center -z-10"></div>
</template>
