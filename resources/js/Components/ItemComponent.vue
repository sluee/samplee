<template>

    <div class="bg-white p-6 rounded shadow-sm cursor-pointer flex flex-col">
        <div class="flex-1" @click="openItem">
            <img :src="item.picUrl" alt="Product photo" class="aspect-square w-full object-cover mb-4">
            <h4 class="text-2xl">Item: {{ item?.name }}</h4>
            <div class="text-gray-400">{{ item?.description }}</div>
        </div>
        <div class="flex justify-between">
            <div>&nbsp;</div>
            <label class="switch">
                <input type="checkbox"  :checked="item.enabled" @change.prevent="toggleEnabled(item)">
                <span class="slider"></span>
              </label>
        </div>

    </div>

</template>

<style scoped>
.switch {
    position: relative;
    display: inline-block;
    width: 120px;
    height: 34px;
   }

   .switch input {
    display: none;
   }

   .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #3C3C3C;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
   }

   .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 50%;
   }

   input:checked + .slider {
    background-color: #0E6EB8;
   }

   input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
   }

   input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(85px);
   }

   /*------ ADDED CSS ---------*/
   .slider:after {
    content: 'DISABLED';
    color: white;
    display: block;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    font-size: 10px;
    font-family: Verdana, sans-serif;
   }

   input:checked + .slider:after {
    content: 'ENABLED';
   }

   /*--------- END --------*/

</style>
<script setup>
import { router } from '@inertiajs/vue3';


const prop = defineProps({
    item: Object
})

function openItem() {
    router.visit('/items/' + prop.item.id)
}

function toggleEnabled(item) {
    router.visit('/items/toggle/' + item.id,{
        method: 'post',
        preserveScroll: true
    })
}

</script>
