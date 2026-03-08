<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
 
const props = defineProps({
    userBook: Object,
});
 
const form = useForm({
    status: props.userBook.status,
    progress_pages: props.userBook.progress_pages,
    rating: props.userBook.rating,
    started_at: props.userBook.started_at ? new Date(props.userBook.started_at).toISOString().slice(0, 10) : '',
    finished_at: props.userBook.finished_at ? new Date(props.userBook.finished_at).toISOString().slice(0, 10) : '',
});
 
const submit = () => {
    form.put(route('user-shelf.update', props.userBook.id));
};
</script>
 
<template>
    <Head :title="`Detalhes: ${userBook.book.title}`" />
 
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalhes do Livro: {{ userBook.book.title }}</h2>
        </template>
 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel value="Título do Livro" />
                                    <p class="mt-1 text-lg font-medium">{{ userBook.book.title }}</p>
                                </div>
                                <div>
                                    <InputLabel value="Autor" />
                                    <p class="mt-1 text-lg font-medium">{{ userBook.book.author }}</p>
                                </div>
                                <div>
                                    <InputLabel value="Total de Páginas" />
                                    <p class="mt-1 text-lg font-medium">{{ userBook.book.page_count }}</p>
                                </div>
                            </div>
 
                            <div class="mt-6">
                                <InputLabel for="status" value="Status de Leitura" />
                                <select
                                    id="status"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    v-model="form.status"
                                >
                                    <option value="quero_ler">Quero Ler</option>
                                    <option value="lendo">Lendo</option>
                                    <option value="lido">Lido</option>
                                    <option value="abandonei">Abandonei</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.status" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="progress_pages" value="Páginas Lidas" />
                                <TextInput
                                    id="progress_pages"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.progress_pages"
                                    :max="userBook.book.page_count"
                                />
                                <InputError class="mt-2" :message="form.errors.progress_pages" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="rating" value="Avaliação (1-5)" />
                                <TextInput
                                    id="rating"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.rating"
                                    min="1"
                                    max="5"
                                />
                                <InputError class="mt-2" :message="form.errors.rating" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="started_at" value="Data de Início" />
                                <TextInput
                                    id="started_at"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.started_at"
                                />
                                <InputError class="mt-2" :message="form.errors.started_at" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="finished_at" value="Data de Conclusão" />
                                <TextInput
                                    id="finished_at"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.finished_at"
                                />
                                <InputError class="mt-2" :message="form.errors.finished_at" />
                            </div>
 
                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Atualizar Livro
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
