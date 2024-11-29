<template>
    <h1 v-bind:class="colorClass"> Hi~{{name}}. Your First Vue.JS webpage.</h1>
    
</template>

<script>
export default{
    name: 'step-1',
    props:{
        name: String,
        colorClass: String,
    }
}

</script>

<style>
.myColor {
      color: red;
    }
</style>