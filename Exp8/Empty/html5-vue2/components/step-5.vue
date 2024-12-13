<template>
    <!-- 之前範例錯誤，忘記將$emit()第一個參數用字串形式 -->
    <button @click="$emit('toggle')">Toggle</button>
    <p v-if="flag">Vue is awesome.</p>
    <p v-else>Vue is nothing!</p>
</template>

<script>
export default {
    name: 'step-5',
    props: {
        flag: Boolean,
    },
    // 之前範例沒有指明emit，會造成語法不嚴謹，會出現Warning
    // 建議改成Component寫法時，要寫上這部分
    emits: ['toggle'],
}
</script>