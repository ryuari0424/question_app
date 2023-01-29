<template>
    <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-teal-500 mb-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="#pablo">
                    今来た3行解答アプリ
                </a>
                <button class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" @click="showMenu = !showMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>

                </button>
            </div>
            <div v-bind:class="{ 'hidden': !showMenu, 'flex': showMenu }" class="lg:flex lg:flex-grow items-center">
                <ul class="flex flex-col lg:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <NavLink class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white" :href="route('user.createQuestion')">
                            質問
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white" :href="route('user.myPage')">
                            マイページ
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white" :href="route('logout')" method="post">
                            ログアウト
                        </NavLink>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref } from 'vue';
import NavLink from '@/Components/NavLink.vue';

const showMenu = ref(false);

// const toggleNavbar = () => {
//     showMenu = !showMenu;
// }
</script>
