<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
 
defineProps({
    userBooks: Array,
});
 
const getStatusColor = (status) => {
    switch (status) {
        case 'quero_ler': return 'bg-blue-100 text-blue-800';
        case 'lendo': return 'bg-yellow-100 text-yellow-800';
        case 'lido': return 'bg-green-100 text-green-800';
        case 'abandonei': return 'bg-red-100 text-red-800';
        default: return 'bg-gray-100 text-gray-800';
    }
};
</script>
 
<template>
    <Head title="Minha Estante" />
 
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Minha Estante</h2>
        </template>
 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div v-if="userBooks.length > 0">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progresso</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="userBook in userBooks" :key="userBook.id">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ userBook.book.title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ userBook.book.author }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span :class="['px-2 inline-flex text-xs leading-5 font-semibold rounded-full', getStatusColor(userBook.status)]">
                                                {{ userBook.status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ userBook.progress_pages }} / {{ userBook.book.page_count }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <Link :href="route('user-shelf.show', userBook.id)" class="text-indigo-600 hover:text-indigo-900 mr-4">Detalhes</Link>
                                            <Link :href="route('user-shelf.destroy', userBook.id)" method="delete" as="button" class="text-red-600 hover:text-red-900">Remover</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="text-center text-gray-500">
                            Sua estante está vazia. Adicione livros do catálogo!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
