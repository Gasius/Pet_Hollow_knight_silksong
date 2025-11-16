<script setup>
import Navbar from "@/Components/Navbar.vue";
import {Link, router} from "@inertiajs/vue3";
import {computed, ref} from "vue";

const props = defineProps({
    quest: { type: Object, required: true }
});

const currentSlideIndex = ref(0);

const currentSlide = computed(() => {
    return props.quest.slides?.[currentSlideIndex.value] || null;
});
const nextSlide = () => {
    if (currentSlideIndex.value < props.quest.slides.length - 1) {
        currentSlideIndex.value++;
    }
};
const prevSlide = () => {
    if (currentSlideIndex.value > 0) {
        currentSlideIndex.value--;
    } else {
        router.get(route('quests.index'))
    }
};
</script>

<template>
    <div class="relative min-h-screen flex items-center">
        <Navbar/>
        <div class="mx-auto flex">
            <button @click="prevSlide">
                <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300 hover:bg-gray-800/70 h-14 w-14 bg-gray-800/50 backdrop-blur-[5px] rounded-[30px] shadow-lg" fill="none" viewBox="0 0 24 24" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <div class="bg-gray-800/50 backdrop-blur-[5px] p-6 m-3 rounded-[30px] shadow-lg max-w-3xl">
                <h1 class="text-3xl font-bold text-center text-white/80 mb-6">
                    {{ quest.title }}
                </h1>
                <img :src="currentSlide.image" alt="Картинка слайда" class="rounded-md">
                <div class="text-start text-white/80 mt-6">
                    {{ currentSlide.text }}
                </div>
            </div>
            <button @click="nextSlide">
                <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300 hover:bg-gray-800/70 h-14 w-14 bg-gray-800/50 backdrop-blur-[5px] rounded-[30px] shadow-lg" fill="none" viewBox="0 0 24 24" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            </button>

        </div>
    </div>
</template>
