<template>
  <h1 :class="colorClass">
    Hi~{{ name }}. Your First Vue.JS webpage.
  </h1>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    name: String,
    colorClass: String,
});
</script>

<style>
.myColor {
    color: red;
}
</style>