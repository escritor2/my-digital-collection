<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
 
const props = defineProps({
    readingSession: Object,
});
 
const form = useForm({
    ended_at: new Date().toISOString().slice(0, 16), // Data e hora atual
    pages_read: '',
});
 
const submit = () => {
    form.put(route('reading-sessions.update', props.readingSession.id));
};
</script>
 
<template>
    <Head :title="`Finalizar Sessão: ${readingSession.user_book.book.title}`" />
 
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Finalizar Sessão de Leitura</h2>
        </template>
 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel value="Livro" />
                                    <p class="mt-1 text-lg font-medium">{{ readingSession.user_book.book.title }}</p>
                                </div>
                                <div>
                                    <InputLabel value="Autor" />
                                    <p class="mt-1 text-lg font-medium">{{ readingSession.user_book.book.author }}</p>
                                </div>
                                <div>
                                    <InputLabel value="Início da Sessão" />
                                    <p class="mt-1 text-lg font-medium">{{ new Date(readingSession.started_at).toLocaleString('pt-BR') }}</p>
                                </div>
                            </div>
 
                            <div class="mt-6">
                                <InputLabel for="ended_at" value="Data e Hora de Término" />
                                <TextInput
                                    id="ended_at"
                                    type="datetime-local"
                                    class="mt-1 block w-full"
                                    v-model="form.ended_at"
                                    required
                                />
                                <InputError class="mt-2" :message="form.errors.ended_at" />
                            </div>
 
                            <div class="mt-4">
                                <InputLabel for="pages_read" value="Páginas Lidas Nesta Sessão" />
                                <TextInput
                                    id="pages_read"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.pages_read"
                                    required
                                    min="1"
                                />
                                <InputError class="mt-2" :message="form.errors.pages_read" />
                            </div>
 
                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Finalizar Sessão
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
