<template>
    <input :value="text" @input="$emit('readInput', $event)" placeholder="Type Here">
    <p>{{ text }}</p>
</template>

<script>
export default {
    name: 'step-3',
    props: {
        text: String
    },
    emits: ['readInput'],
}
</script>