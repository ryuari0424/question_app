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
                        {{ question.title }}
                    </div>
                    <p class="text-gray-700 text-base"></p>
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-sm flex">
                        <p class="align-bottom pr-2 text-gray-600">投稿日:{{ dayjs(question.created_at).fromNow() }}</p>
                        <Link :href="route('user.showAnswer', question.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-8 -2 32 32" fill="currentColor" class="text-blue-300 w-6 h-6">
                            <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97z" clip-rule="evenodd" />
                        </svg>
                        </Link>
                        <span class="text-gray-600">
                            {{ question.answers.length }}
                        </span>
                    </div>
                    <Link>
                        <button>投稿内容編集</button>
                    </Link>
                        <button @click="destroy(question.id)" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                            削除
                        </button>
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

function destroy(id) {
    if (confirm("投稿を削除しますが、よろしいですか？"))
    {
        Inertia.delete(route("user.destroyQuestion", id));
    }
}
</script>
