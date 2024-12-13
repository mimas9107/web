<template>
    <button @click="$emit('toggle')">Toggle</button>
    <p v-if="flag">Vue is awesome.</p>
    <p v-else>Vue is nothing!</p>
</template>

<script>
export default {
    name: 'step-5',
    props: {
        flag: Boolean
    },
    emits: ['toggle'],
}
</script>