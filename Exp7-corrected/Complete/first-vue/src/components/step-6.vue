<template>
    <!-- 之前範例錯誤，忘記將$emit()第一個參數用字串形式 -->
    <form @submit.prevent="$emit('addTodo')">
        <!-- 針對v-model，要修正成modelValue，並加上update:modelValue事件 -->
        <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" required placeholder="new todo" />
        <button>Add Todo</button>
    </form>
    <ul>
        <li v-for="todo in todos" :key="todo.id">
            {{ todo.text }}
            <!-- 之前範例錯誤，忘記將$emit()第一個參數用字串形式 -->
            <!-- 過去在HTML內可以使用 removeTodo(todo) 方式呼叫，在Component內使用$emit()則是將()內參數放到第2,3,...個參數傳入  -->
            <button @click="$emit('removeTodo', todo)">X</button>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'step-6',
    props: {
        modelValue: String,
        todos: { type: Array },
    },
    // 之前範例沒有指明emit，會造成語法不嚴謹，會出現Warning
    // 建議改成Component寫法時，要寫上這部分
    emits: ['addTodo', 'update:modelValue', 'removeTodo'],
}
</script>
