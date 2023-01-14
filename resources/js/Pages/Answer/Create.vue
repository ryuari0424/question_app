<template>
    <Navbar />
    <p>{{ props.user }}</p>
    <p>{{ props.question }}</p>

    <div class="card grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4 m-4">
            <div class="flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" title="Woman holding a mug">
            </div>
            <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                    <svg class="fill-current text-red-900 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                <!-- 回答フォーム1 -->
                <div class="mt-6">
                <h2>あなたの回答を投稿してください。</h2>
                <span>※3行以内で簡潔な回答をお願いします。</span>
                    <form @submit.prevent="form.post(route('user.storeAnswer', props.question.id))">
                        <div class="form-group mb-6">
                            <div class="my-3">
                                <input type="text" v-model="form.answering1" class="form-control block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7" placeholder="回答1行目">
                                <div v-if="form.errors.answering1">{{ form.errors.answering1 }}</div>
                            </div>
                            <!-- 2行目 -->
                            <div class="my-3">
                                <input type="text" v-model="form.answering2" class="form-control block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7" placeholder="回答2行目">
                                <div v-if="form.errors.answering2">{{ form.errors.answering2 }}</div>
                            </div>
                            <!-- 回答3行目 -->
                            <div class="my-3">
                                <input type="text" v-model="form.answering3" class="form-control block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7" placeholder="回答3行目">
                                <div v-if="form.errors.answering3">{{ form.errors.answering3 }}</div>
                            </div>
                        </div>
                        <button type="submit" :disabled="form.processing" class="
                          px-6
                          py-2.5
                          bg-blue-600
                          text-white
                          font-medium
                          text-xs
                          leading-tight
                          uppercase
                          rounded
                          shadow-md
                          hover:bg-blue-700 hover:shadow-lg
                          focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                          active:bg-blue-800 active:shadow-lg
                          transition
                          duration-150
                          ease-in-out">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <p></p>
</template>


<script setup>
import Navbar from '@/components/Navbar.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
    answering1: '',
    answering2: '',
    answering3: '',
});

const props = defineProps({
    // user: {
    //     type: Object
    // },
    question: {
        type: Object
    }
});
</script>
