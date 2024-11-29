<template>
    <input v-bine:value="text" v-on:input="$emit(readInput)" placeholder="Type Here">
    <p>{{ text }}</p>
</template>

<script>
export default {
    name: 'step-3',
    props: {
        text: String
    }
}
</script>