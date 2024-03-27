<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
// import { defineProps } from 'vue';

defineProps({
    post: {
        type: Object
    },
});
</script>

<template>
    <Head title="CRUD - Assignment" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">CRUD: Read!</h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link :href="`${route('crud.create')}`"
                    class="rounded hover:bg-lime-200 bg-green-200 text-green-950 font-bold p-2 ml-2 border-solid border-2 border-slate-400 dark:border-none">
                    Create New Post
                </Link>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100  bg-slate-200 dark:bg-cyan-950"><Link :href="`${route('crud')}`" class="text-blue-600 rounded hover:text-blue-400">[ All Posts ]</Link></div>

                    <div
                        class="p-6 text-gray-900 dark:text-gray-100"
                    >
                        <h2 class="text-2xl">{{ post.title }}</h2>
                        <p>Written by {{ post.author }} on {{ post.created_at }}</p>
                        <p>Last updated: {{ post.updated_at }}</p>
                        <p class="my-2">{{ post.content }}</p>
                        <Link :href="`/crud/edit/${post.id}`" class="text-orange-600 rounded hover:text-orange-400">[edit]</Link><Link :href="`/crud/delete/${post.id}`" class="text-red-600 rounded ml-4 hover:text-red-400">[Delete]</Link>

                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
