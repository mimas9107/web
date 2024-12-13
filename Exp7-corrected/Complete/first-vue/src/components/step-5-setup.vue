<template>
    <!-- 之前範例錯誤，忘記將$emit()第一個參數用字串形式 -->
    <button @click="$emit('toggle')">Toggle</button>
    <p v-if="flag">Vue is awesome.</p>
    <p v-else>Vue is nothing!</p>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    flag: Boolean,
});

defineEmits(['toggle']);
</script>