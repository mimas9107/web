<script setup>
import { ref } from 'vue'

const name = ref("John");
const colorClass = ref("myColor");
const count = ref(0);
const text = ref("");
const flag = ref(true);
let id = 0;
const newTodo = ref("");
const todos = ref([
  { id: id++, text: "Learn HTML" },
  { id: id++, text: "Learn JavaScript" },
  { id: id++, text: "Learn Vue" },
]);

function addCount() {
  count.value++;
}

/*
function readInput(e){
  text.value = e.target.value;
}
*/

function toggle() {
  flag.value = !flag.value;
}

function addTodo() {
  todos.value.push({ id: id++, text: newTodo.value });
  newTodo.value = "";
}

function removeTodo(todo) {
  todos.value = todos.value.filter((t) => t !== todo);
}
</script>

<template>
  <h1 v-bind:class="colorClass">
    Hi~{{ name }}. Your First Vue.JS webpage.
  </h1>
  <hr />
  <button v-on:click="addCount">Count is: {{ count }}.</button>
  <hr />
  <input v-model="text" placeholder="Type Here" />
  <p>{{ text }}</p>
  <hr />
  <button v-on:click="toggle">Toggle</button>
  <p v-if="flag">Vue is awesome.</p>
  <p v-else>Vue is nothing!</p>
  <hr />
  <form @submit.prevent="addTodo">
    <input v-model="newTodo" required placeholder="new todo" />
    <button>Add Todo</button>
  </form>
  <ul>
    <li v-for="todo in todos" :key="todo.id">
      {{ todo.text }}
      <button @click="removeTodo(todo)">X</button>
    </li>
  </ul>
</template>

<style>
.myColor {
    color: red;
}
</style>
<!--
<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <HelloWorld msg="Welcome to Your Vue.js App"/>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'

export default {
  name: 'App',
  components: {
    HelloWorld
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
-->