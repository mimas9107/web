<template>
    <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" placeholder="Type Here">
    <p>{{ modelValue }}</p>
</template>

<script>
export default {
    name: 'step-4',
    props: {
        modelValue: String,
    },
    emits: ['update:modelValue'],
}
</script>