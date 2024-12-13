<template>
    <!-- 之前範例缺少v-model事件更新，故會造成資料不同步 -->
    <!-- 針對v-model事件處理，必須觸發 update:modelValue 事件 -->
    <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" placeholder="Type Here">
    <p>{{ modelValue }}</p>
</template>

<script>
export default {
    name: 'step-4',
    // 之前範例誤用Component內取得v-model的寫法
    // 過去都是傳入參數text名稱
    // 這裡因為是使用v-model方式傳入，故該變數改成modelValue
    props: {
        modelValue: String,
    },
    // 之前範例沒有指明emit，會造成語法不嚴謹，會出現Warning
    // 建議改成Component寫法時，要寫上這部分
    emits: ['update:modelValue'],
}
</script>