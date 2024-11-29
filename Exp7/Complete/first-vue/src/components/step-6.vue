<template>
    <form @submit.prevent="$emit(addTodo)">
        <input :value="newTodo" required placeholder="new todo" />
        <button>Add Todo</button>
    </form>
    <ul>
        <li v-for="todo in todos" :key="todo.id">
            {{ todo.text }}
            <button @click="$emit(removeTodo(todo))">X</button>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'step-6',
    props: {
        newTodo: String,
        todos: { type: Array },
    }
}
</script>

