<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
// import { defineProps } from 'vue';

defineProps({
    posts: {
        type: Object
    },
});

const form = reactive({
  ids: [],
})
function submit() {
  router.post('/crud/deletebulk', form)
}
</script>

<template>
    <Head title="CRUD - Assignment" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Welcome to the CRUD project!</h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link :href="`crud/create`"
                    class="rounded hover:bg-lime-200 bg-green-200 text-green-950 font-bold p-2 ml-2 border-solid border-2 border-slate-400 dark:border-none">
                    Create New Post
                </Link>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100  bg-slate-200 dark:bg-cyan-950">CRUD project showing all posts:</div>
                    <form  @submit.prevent="submit">
                        <div
                            v-for="post in posts" :key="post.id"
                            class="p-6 text-gray-900 dark:text-gray-100 flex items-center"
                        >
                            <div class="mr-4"><input type="checkbox" v-model="form.ids" :value="post.id" class="rounded"/></div>
                            <div>
                                <h2>{{ post.title }}</h2>
                                <p>by {{ post.author }}</p>
                                <Link :href="`crud/read/${post.id}`" class="text-blue-600 rounded hover:text-blue-400">[ Read ]</Link><Link :href="`/crud/edit/${post.id}`" class="text-orange-600 rounded ml-4 hover:text-orange-400">[ edit ]</Link><Link :href="`/crud/delete/${post.id}`" class="text-red-600 rounded ml-4 hover:text-red-400">[ Delete ]</Link>
                            </div>
                        </div>
                        <button type="submit" class="m-2 rounded bg-red-300 hover:bg-red-400 text-green-950 font-bold p-2 border-solid border-2 border-slate-400 dark:border-none">Delete all</button>

                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
