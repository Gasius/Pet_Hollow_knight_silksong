<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

const form = useForm({
    title: '',
    genre: '',
    description: '',
    image: '',
    specification: '',
    status: 'available',
});

const submit = () => {
    form.post(route('games.store'));
};
</script>

<template>
    <div class="relative min-h-screen pt-16">
        <Navbar />
        <div class="bg-gray-800/50 backdrop-blur-[5px] p-6 rounded-[40px] shadow-lg max-w-3xl mx-auto w-11/12 md:w-1/2 mt-[60px] mb-[40px]">
            <h1 class="text-3xl font-bold text-center mb-6 text-white">Добавить этап</h1>
            <form @submit.prevent="submit">
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-white">Название</label>
                        <input
                            id="title"
                            type="text"
                            v-model="form.title"
                            class="mt-1 block w-full rounded-full border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                        />
                        <div v-if="form.errors.title" class="text-red-500 text-sm mt-1">{{ form.errors.title }}</div>
                    </div>

                    <div>
                        <label for="genre" class="block text-sm font-medium text-white">Категория</label>
                        <input
                            id="genre"
                            type="text"
                            v-model="form.genre"
                            class="mt-1 block w-full rounded-full border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                        />
                        <div v-if="form.errors.genre" class="text-red-500 text-sm mt-1">{{ form.errors.genre }}</div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-white">Описание</label>
                        <textarea
                            id="description"
                            v-model="form.description"
                            rows="4"
                            class="mt-1 block w-full rounded-3xl border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                        ></textarea>
                        <div v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</div>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-white">URL изображения</label>
                        <input
                            id="image"
                            type="text"
                            v-model="form.image"
                            class="mt-1 block w-full rounded-full border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                        />
                        <div v-if="form.errors.image" class="text-red-500 text-sm mt-1">{{ form.errors.image }}</div>
                    </div>

                    <div>
                        <label for="specification" class="block text-sm font-medium text-white">Спецификация</label>
                        <textarea
                            id="specification"
                            v-model="form.specification"
                            rows="4"
                            class="mt-1 block w-full rounded-3xl border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                        ></textarea>
                        <div v-if="form.errors.specification" class="text-red-500 text-sm mt-1">{{ form.errors.specification }}</div>
                    </div>

                    <div v-if="form.errors.status" class="text-red-500 text-sm mt-1">{{ form.errors.status }}</div>
                </div>

                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        :disabled="form.processing"
                    >
                        Добавить игру
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
