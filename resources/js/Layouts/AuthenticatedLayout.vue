<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-zinc-950 text-zinc-100">
        <nav class="bg-zinc-900 border-b border-zinc-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <Link :href="route('dashboard')" class="text-xl font-black tracking-tighter text-emerald-500">
                                My Digital Collection
                            </Link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <Link :href="route('dashboard')" :class="route().current('dashboard') ? 'border-emerald-500 text-emerald-400' : 'border-transparent text-zinc-400 hover:text-zinc-200 hover:border-zinc-300'" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Dashboard
                            </Link>
                            <Link :href="route('books.index')" :class="route().current('books.*') ? 'border-emerald-500 text-emerald-400' : 'border-transparent text-zinc-400 hover:text-zinc-200 hover:border-zinc-300'" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Acervo Completo
                            </Link>
                            <Link :href="route('reading-sessions.index')" :class="route().current('reading-sessions.*') ? 'border-emerald-500 text-emerald-400' : 'border-transparent text-zinc-400 hover:text-zinc-200 hover:border-zinc-300'" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Sessões de Leitura
                            </Link>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <!-- Settings Dropdown -->
                        <div class="ms-3 relative">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-zinc-400 bg-zinc-900 hover:text-zinc-200 focus:outline-none transition ease-in-out duration-150">
                                    {{ user.name }} (Admin)
                                </button>
                                <Link :href="route('logout')" method="post" as="button" class="ml-2 inline-flex items-center px-3 py-2 border border-zinc-700 text-sm leading-4 font-medium rounded-md text-red-400 bg-zinc-800 hover:bg-zinc-700 focus:outline-none transition ease-in-out duration-150">
                                    Sair
                                </Link>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-zinc-900/50 shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>
