<template>
    <Navbar />

    <div class="block p-6 rounded-lg shadow-lg bg-white m-12">
        <form @submit.prevent="form.put(route('user.updateQuestion', question.id))">
            <div class=" form-group mb-6">
                <input type="text" v-model="form.title" class="form-control block
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
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7" placeholder="title">
                <div v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
            <div class="form-group mb-6">
                <textarea v-model="form.content" class="
        form-control
        block
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
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      " id="question_content" rows="3" placeholder=""></textarea>
                <div v-if="form.errors.content">{{ form.errors.content }}</div>
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

    <p>{{ question.id }}</p>
    <p>{{ question.title }}</p>
    <p>{{ form }}</p>
</template>


<script setup>
import Navbar from '@/components/Navbar.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    question: {
        type:Object
    }
})

const form = useForm({
    id: props.question.id,
    title: props.question.title,
    content: props.question.content,
})
</script>
