<template>
    <button v-on:click="$emit('addCount')">Count is: {{ count }}.</button>
</template>

<script>
export default {
    name: 'step-2',
    props: {
        count: Number
    }
}
</script>