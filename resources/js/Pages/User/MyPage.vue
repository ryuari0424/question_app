<template>

    <Navbar />
    <div class="grid grid-cols-6 gap-4">

        <h1 class="p-4 text-xl font-bold bg-white col-start-2 shadow-md col-span-4 mx-4">{{ $page.props.auth.user.name }}様の質問一覧</h1>

    </div>
    <div v-for="question in props.questions" class=" card grid grid-cols-6 gap-4">
        <div class="col-start-2 shadow-md border-b-2 col-span-4 mx-4">
            <div class="border-gray-400 lg:border-gray-400 bg-white p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <div class="text-gray-900 font-bold text-xl mb-2">
                        {{ question.title   }}
                    </div>
                    <p class="text-gray-700 text-base"></p>
                </div>
                <div class="flex items-center">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none"></p>
                        <p class="text-gray-600">投稿日:{{ dayjs(question.created_at).fromNow() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { Inertia } from "@inertiajs/inertia";
import { Link } from '@inertiajs/inertia-vue3'
import Navbar from '@/components/Navbar.vue'

dayjs.extend(relativeTime);

const props = defineProps({
    questions: {
        type: Object
    }
});
</script>
