<template>
    <form @submit.prevent="$emit('addTodo')">
        <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" required placeholder="new todo" />
        <button>Add Todo</button>
    </form>
    <ul>
        <li v-for="todo in todos" :key="todo.id">
            {{ todo.text }}
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
    emits: ['update:modelValue', 'addTodo', 'removeTodo'],
}
</script>

