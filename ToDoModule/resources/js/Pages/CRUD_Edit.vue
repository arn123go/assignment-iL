<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

// import { defineProps } from 'vue';

const props = defineProps({

    post: {
        type: Object,
    },
});

const form = reactive({
  title: null,
  author: null,
  content: null,
})

form.author = props.post.author;
form.title = props.post.title;
form.content = props.post.content;
let formUrl = '/crud/edit/'+props.post.id;

function submit() {
  router.post(formUrl, form)
}

</script>

<template>
    <Head title="CRUD - Assignment" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">CRUD: Edit!</h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100  bg-slate-200 dark:bg-cyan-950"><Link :href="`${route('crud')}`" class="text-blue-600 rounded hover:text-blue-400">[ All Posts ]</Link></div>

                    <div
                        class="p-6 text-gray-900 dark:text-gray-100"
                    >
                        <form @submit.prevent="submit">
                            <label for="title">Title:</label><br/><input type="text" id="title" class="rounded text-gray-900" v-model="form.title" autofocus ><br/><br/>
                            <label for="author">Author:</label><br/><input type="text" id="author" v-model="form.author" class="rounded text-gray-900"><br/><br/>
                            <label for="content">Content:</label><br/> <textarea class="rounded text-gray-900 " v-model="form.content" id="content" rows="10" cols="24"></textarea><br/><br/>
                            <button type="submit" class="rounded hover:bg-lime-200 bg-green-200 text-green-950 font-bold p-2 border-solid border-2 border-slate-400 dark:border-none">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
