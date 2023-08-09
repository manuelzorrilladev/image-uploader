<script setup>
import { ref } from 'vue';
import useClipboard from 'vue-clipboard3'

defineProps({image:Object,url:String})

const {toClipboard} = useClipboard()
const message = ref('Copy')

const copy = async (url)=>{
    await toClipboard(url)
    message.value = 'Copied!'
}



</script>

<template>
    <main class="flex items-center justify-center h-screen duration-200">
        <div class="flex flex-col items-center justify-center border-2 shadow-lg w-1/2 h-3/4 rounded-md gap-1">
            <img src="../../img/check.png" alt="check" class="w-10 rounded-full bg-green-500  p-2" >
            <h3>Uploaded Successfully</h3>
            <img :src="image.url" :alt="image.name" class="max-w-3/6 w-3/5
             border rounded-md">
            <button @click="copy(url)" class="rounded bg-blue-600 text-white w-18 px-8 py-2">{{message}}</button>


        </div>
    </main>


</template>

<style scoped>

</style>
