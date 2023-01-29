<template>

    <div class="">
        <button class="inline-block mr-2 px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-r-green-800 active:shadow-lg transition duration-150 ease-in-out" type="button" @click="showModal = !showModal">
            投稿内容編集
        </button>
        <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
            <div class="relative w-auto my-6 mx-auto max-w-3xl">

                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">

                    <div class="flex items-start justify-center pt-5 border-b border-solid border-slate-200 rounded-t">
                        <h3 class="text-3xl font-semibold">
                             jj
                        </h3>
                    </div>



                    <div class="">
                        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <form @submit.prevent="submit">
                                        <div class="mb-6">
                                            <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                                <input type="text" v-model="form.title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="">

                                            <div v-if="form.errors.title" class="text-sm text-red-600">
                                                {{ form.errors.title }}
                                            </div>
                                        </div>

                                        <div class="mb-6">
                                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Content</label>
                                            <textarea type="text" v-model="form.content" name="content" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                            <div v-if="form.errors.content" class="text-sm text-red-600">
                                                {{ form.errors.content }}
                                            </div>
                                        </div>
                                        <button type="submit" class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 " :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                        <button class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" v-on:click="showModal = !showModal">
                            Close
                        </button>
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" v-on:click="toggleModal()">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    question: Object
});

const form = useForm({
    title: '',
    content: '',
})

const showModal = ref(false);
</script>
