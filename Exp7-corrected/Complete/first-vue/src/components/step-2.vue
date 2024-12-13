<template>
    <button @click="$emit('addCount')">Count is: {{ count }}.</button>
</template>

<script>
export default {
    name: 'step-2',
    props: {
        count: Number
    },
    // 之前範例沒有指明emit，會造成語法不嚴謹，會出現Warning
    // 建議改成Component寫法時，要寫上這部分
    emits: ['addCount'],
}
</script>