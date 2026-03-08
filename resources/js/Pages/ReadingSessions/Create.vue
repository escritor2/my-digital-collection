<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
 
const props = defineProps({
    userBooks: Array,
});
 
const form = useForm({
    user_book_id: '',
    started_at: new Date().toISOString().slice(0, 16), // Data e hora atual
});
 
const submit = () => {
    form.post(route('reading-sessions.store'));
};
</script>
 
<template>
    <Head title="Iniciar Sessão de Leitura" />
 
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Iniciar Nova Sessão de Leitura</h2>
        </template>
 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="mt-4">
                                <InputLabel for="user_book_id" value="Livro na Estante" />
                                <select
                                    id="user_book_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    v-model="form.user_book_id"
                                    required
                                >
                                    <option value="">Selecione um livro</option>
                                    <option v-for="userBook in userBooks" :key="userBook.id" :value="userBook.id">
                                        {{ userBook.book.title }} ({{ userBook.book.author }})
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.user_book_id" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="started_at" value="Data e Hora de Início" />
                                <TextInput
                                    id="started_at"
                                    type="datetime-local"
                                    class="mt-1 block w-full"
                                    v-model="form.started_at"
                                    required
                                />
                                <InputError class="mt-2" :message="form.errors.started_at" />
                            </div>
 
                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Iniciar Sessão
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
