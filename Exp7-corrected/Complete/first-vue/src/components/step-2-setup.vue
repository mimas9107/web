<template>
    <button @click="$emit('addCount')">Count is: {{ count }}.</button>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
        count: Number
});

defineEmits(['addCount']);
</script>