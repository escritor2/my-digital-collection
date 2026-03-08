<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
 
const form = useForm({
    title: '',
    author: '',
    description: '',
    isbn: '',
    page_count: '',
});
 
const submit = () => {
    form.post(route('books.store'));
};
</script>
 
<template>
    <Head title="Adicionar Livro" />
 
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Adicionar Novo Livro</h2>
        </template>
 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="mt-4">
                                <InputLabel for="title" value="Título" />
                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                />
                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="author" value="Autor" />
                                <TextInput
                                    id="author"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.author"
                                    required
                                />
                                <InputError class="mt-2" :message="form.errors.author" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="description" value="Descrição" />
                                <textarea
                                    id="description"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    v-model="form.description"
                                ></textarea>
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="isbn" value="ISBN" />
                                <TextInput
                                    id="isbn"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.isbn"
                                />
                                <InputError class="mt-2" :message="form.errors.isbn" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="page_count" value="Número de Páginas" />
                                <TextInput
                                    id="page_count"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.page_count"
                                />
                                <InputError class="mt-2" :message="form.errors.page_count" />
                            </div>
 
                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Adicionar Livro
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
