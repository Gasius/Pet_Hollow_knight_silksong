<script setup>
import { Link, router } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

defineProps({
    quest: { type: Object },
    isAdmin: { type: Boolean },
});

</script>

<template>
    <div class="min-h-screen flex items-center">
        <Navbar />
        <div class="bg-gray-800/50 backdrop-blur-[5px] p-6 rounded-[30px] shadow-lg max-w-3xl mx-auto">
            <div v-if="quest">
                <Link :href="route('quests.show', quest.id)">
                    <p class="text-3xl font-bold text-center text-white/80">{{ quest.title }}</p>
                    <img
                        :src="quest.image"
                        :alt="quest.title"
                        class="w-full h-full object-cover mt-4 rounded-md hover:brightness-75 transition-all duration-300"
                    />
                </Link>
            </div>
        </div>
    </div>
</template>
