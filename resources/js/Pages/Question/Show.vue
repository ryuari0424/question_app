<template>
    <Navbar />
    <div class="card grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4 mx-4 my-2">
            <div class="flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden">
            </div>
            <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">

                    <div class="text-gray-900 font-bold text-xl mb-2">{{ question.title }}</div>
                    <p class="text-gray-700 text-base">{{ question.content }}</p>
                </div>
                <div class="flex items-center">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">{{ question.user.name }}</p>
                        <p class="text-gray-600">投稿日:{{ dayjs(question.created_at).fromNow() }}</p>
                    </div>
                </div>
                <div class="flex">
                    <Link :href="route('user.createAnswer', question.id)">
                    <button v-if="question.user_id != $page.props.auth.user.id" class="mr-5 mt-3 inline-block px-3 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">質問に回答する</button>
                    </Link>
                </div>

            </div>
        </div>
    </div>

<!-- 回答カード -->
    <div class="grid grid-cols-6 gap-4">
        <h1 v-if="question.answers != '' " class="p-4 text-xl font-bold bg-white col-start-2 shadow-md col-span-4 mx-4">回答({{ question.answers.length }})</h1>
        <h1 v-else class="p-4 text-xl font-bold bg-white col-start-2 shadow-md col-span-4 mx-4">回答はまだありません。</h1>

    </div>
    <div v-for="answer in props.question.answers" class=" card grid grid-cols-6 gap-4">
        <div class="col-start-2 shadow-md border-b-2 col-span-4 mx-4">
            <div class="border-gray-400 lg:border-gray-400 bg-white p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <div class="text-gray-900 font-bold text-xl mb-2">{{ answer.answering1 }}</div>
                    <div class="text-gray-900 font-bold text-xl mb-2">{{ answer.answering2 }}</div>
                    <div class="text-gray-900 font-bold text-xl mb-2">{{ answer.answering3 }}</div>

                </div>
                <div class="flex items-center">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">{{ question.user.name }}</p>
                        <p class="text-gray-600">回答日:{{ dayjs(question.created_at).fromNow() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
// import {ref} from 'vue';
// import { defineProps } from 'vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { Inertia } from "@inertiajs/inertia";
import { Link } from '@inertiajs/inertia-vue3'
import Navbar from '@/components/Navbar.vue'

dayjs.extend(relativeTime);

const props = defineProps({
    user: {
        type: Object
    },
    question: {
        type: Object
    }
});

function destroy(id) {
    if (confirm("Are you sure you want to Delete"))
    {
        form.delete(route('blogs.destroy', props.question.id));
    }
}
</script>
