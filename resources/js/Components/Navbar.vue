<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

const page = usePage();
const user = computed(() => page.props.auth.user);
const isAdmin = computed(() => user.value && user.value.role === 'admin');

</script>

<template>
    <nav class="bg-gray-800/50 backdrop-blur-[5px] p-4 flex justify-between items-center fixed top-0 w-full z-10 shadow-lg">
        <a href="/games">
            <img class="w-[120px] invert" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Hollow_Knight_Silksong_Logo.svg/1600px-Hollow_Knight_Silksong_Logo.svg.png?20250820104500" alt="logo">
        </a>

        <div class="flex items-center space-x-4">
            <Link v-if="isAdmin" :href="route('games.create')" class="py-2 px-4 rounded-full shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Добавить этап
            </Link>

            <div v-if="user" class="flex items-center space-x-4">
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button
                                class="px-3 py-1 inline-flex items-center border focus-border-0 border-white rounded-full text-white"
                            >
                                {{ user.name }}

                                <svg
                                    class="ms-2 -me-0.5 h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </span>
                    </template>
                    <template #content>
                        <DropdownLink :href="route('profile.edit')"> Профиль </DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">
                            Выход
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>

            <div v-else class="flex items-center space-x-4">
                <Link :href="route('login')" class="text-white hover:text-red-600 transition-colors duration-300">
                    Войти
                </Link>
                <Link :href="route('register')" class="py-2 px-4 rounded-md text-sm font-medium text-white bg-gray-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Зарегистрироваться
                </Link>
            </div>
        </div>
    </nav>
    <div class="fixed inset-0 bg-[url('https://images.squarespace-cdn.com/content/v1/606d4bb793879d12d807d4c8/1618988252161-50HJPZWN80NSUEDGDHMT/Hornet_banner_wide-1.jpg?format=2500w')] bg-no-repeat bg-cover bg-center -z-10"></div>
</template>
