<template>
    <Navbar />

    <span class="font-medium">
        {{ $page.props.flash.message }}
    </span>
    <div class="card grid grid-cols-6 gap-4" v-for="question in props.questions">
        <div class="col-start-2 col-span-4 m-4">
            <div class="flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" title="Woman holding a mug">
            </div>
            <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                </svg>
                unchi
              </p>
                    <div class="text-gray-900 font-bold text-xl mb-2">{{ question.title }}</div>
                    <p class="text-gray-700 text-base">{{ question.content }}</p>
                </div>
                <div class="flex items-center">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">{{ question.user.name }}</p>
                        <p class="text-gray-600">投稿日:Aug 18</p>
                    </div>
                </div>
                <div class="flex">
                    <Link :href="route('user.createAnswer', question.id)">
                    <button class="mr-3 mt-3 inline-block px-3 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg
                    focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">質問に回答する</button>
                    </Link>
                    <!-- 回答確認 -->
                    <Link :href="route('user.showAnswer', question.id)">
                    <div>
                    <span><svg class="h-6 w-6 text-yellow-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="9" y1="10" x2="9.01" y2="10" />
                        <line x1="15" y1="10" x2="15.01" y2="10" />
                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0" />
                    </svg></span>{{ question.answers.length }}
                    </div>
                    <button class="mt-3 inline-block px-3 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg
                    focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">回答を確認する</button>
                    </Link>
                </div>
                <div class="flex justify-between">
                    <!-- 投稿削除ボタン -->
                    <button v-if="role == 'admin'" class="inline-block px-3 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out">投稿削除</button>

                </div>
            </div>
        </div>
    </div>
    <p>{{ $page.props.auth.user.role }}</p>


</template>

<script setup>
// import {ref} from 'vue';
// import { defineProps } from 'vue';
import { Inertia } from "@inertiajs/inertia";
import { Link } from '@inertiajs/inertia-vue3'
import Navbar from '@/components/Navbar.vue'

const props = defineProps({
    user: {
        type: Object
    },
    questions: {
        type: Object
    }
});

const role = props.user.role;




</script>
