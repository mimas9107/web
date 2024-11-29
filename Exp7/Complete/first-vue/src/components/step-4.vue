<template>
    <input :value="text" placeholder="Type Here">
    <p>{{ text }}</p>
</template>

<script>
export default {
    name: 'step-4',
    props: {
        text: String
    }
}
</script>