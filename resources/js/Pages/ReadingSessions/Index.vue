<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
 
defineProps({
    readingSessions: Array,
});
 
const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    return new Date(dateString).toLocaleDateString('pt-BR', options);
};
</script>
 
<template>
    <Head title="Sessões de Leitura" />
 
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sessões de Leitura</h2>
        </template>
 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-end mb-4">
                            <Link :href="route('reading-sessions.create')" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Iniciar Nova Sessão
                            </Link>
                        </div>
 
                        <div v-if="readingSessions.length > 0">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Livro</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Início</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fim</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duração (min)</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Páginas Lidas</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="session in readingSessions" :key="session.id">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ session.user_book.book.title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ formatDate(session.started_at) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ session.ended_at ? formatDate(session.ended_at) : 'Em andamento' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ session.duration_minutes ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ session.pages_read ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <Link v-if="!session.ended_at" :href="route('reading-sessions.show', session.id)" class="text-indigo-600 hover:text-indigo-900 mr-4">Finalizar</Link>
                                            <Link :href="route('reading-sessions.destroy', session.id)" method="delete" as="button" class="text-red-600 hover:text-red-900">Excluir</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="text-center text-gray-500">
                            Nenhuma sessão de leitura registrada.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
