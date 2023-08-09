<script setup>
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

import { useDropzone } from 'vue3-dropzone';
const files = new FormData()
const loading = ref(false)




const fileInput = (event) => {
    loading.value = !loading.value
    files.append("image",event.target.files[0])
    router.post('/upload', files)
}
const onDrop = (acceptFiles, rejectReason) => {
        loading.value = !loading.value
        files.append("image",acceptFiles[0])
        router.post('/upload', files)
    }


    const { getRootProps, getInputProps, isDragActive } = useDropzone({ onDrop })

</script>

<template>
    <main class="flex items-center justify-center h-screen duration-200">
        <div :class="[loading ? 'hidden' : '']"
            class=" flex flex-col items-center justify-center border-2 shadow-lg w-1/2 h-3/4 rounded-md">
            <h2>Upload your image</h2>
            <p class="text-xs font-thin">Files should be JPG or PNG</p>
            <div v-bind="getRootProps()" :class="[isDragActive ? 'bg-orange-100' : 'bg-blue-100']"
                class="border-dashed border-4  p-14 rounded w-80 flex border-cyan-400 flex-col items-center justify-center  hover:bg-blue-200 ">
                <input v-bind="getInputProps()">
                <img src="../../img/image.svg" alt="img">
                <p v-if="isDragActive" class="text-sm font-thin text-center p-2 ">Drag here</p>
                <p v-else class="text-xs font-thin text-center p-2">Drag your images</p>
            </div>
            <p>or</p>
            <input @change="fileInput" accept="image/" name="file" type="file"
                class="text-xs px-4 py-2.5 bg-blue-700 hover:bg-blue-500 text-white rounded duration-200" />
        </div>
        <div :class="[loading ? '' : 'hidden']" class="w-full flex items-center justify-center h-screen">
            <div id="loadingBar" class=" duration-100 w-1/2 shadow-lg border h-40 p-10 rounded ">
                <h2 class=" mt-4 mb-3">Uploading</h2>
                <div class="block h-2 w-full   bg-slate-400 rounded-lg overflow-hidden">

                    <span class="animate-load-bar block h-2 w-20 -translate-x-20 bg-blue-600 rounded-lg "></span>
                </div>
            </div>
        </div>

    </main>
</template>

