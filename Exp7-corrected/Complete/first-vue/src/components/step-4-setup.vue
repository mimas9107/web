<template>
    <!-- 之前範例缺少v-model事件更新，故會造成資料不同步 -->
    <!-- 針對v-model事件處理，必須觸發 update:modelValue 事件 -->
    <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" placeholder="Type Here">
    <p>{{ modelValue }}</p>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    modelValue: String
});

defineEmits(['update:modelValue']);
</script>