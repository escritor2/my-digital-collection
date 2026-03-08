<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
 
defineProps({
    books: Array,
});
</script>
 
<template>
    <Head title="Catálogo de Livros" />
 
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Catálogo de Livros</h2>
        </template>
 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-end mb-4">
                            <Link :href="route('books.create')" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Adicionar Novo Livro
                            </Link>
                        </div>
 
                        <div v-if="books.length > 0">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Páginas</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="book in books" :key="book.id">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ book.title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ book.author }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ book.page_count }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <Link :href="route('books.show', book.id)" class="text-indigo-600 hover:text-indigo-900 mr-4">Ver</Link>
                                            <Link :href="route('books.edit', book.id)" class="text-green-600 hover:text-green-900 mr-4">Editar</Link>
                                            <Link :href="route('books.destroy', book.id)" method="delete" as="button" class="text-red-600 hover:text-red-900">Excluir</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="text-center text-gray-500">
                            Nenhum livro encontrado no catálogo.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
