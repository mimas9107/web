<template>
    <!-- 請注意，因為改到Component內，原本在HTML時會自動把控制項事件帶入，這裡必須自己傳進 $event -->
    <!-- 請注意，之前範例出錯，忘記將$emit的第一個參數(指定function)時使用字串方式傳入，會造成錯誤 -->
    <input :value="text" @input="$emit('readInput', $event)" placeholder="Type Here">
    <p>{{ text }}</p>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    text: String
});

defineEmits(['readInput']);
</script>