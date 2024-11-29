<script setup>
import { ref } from 'vue';

import step1 from './components/step-1.vue';
import step2 from './components/step-2.vue';
import step3 from './components/step-3.vue';
import step4 from './components/step-4.vue';
import step5 from './components/step-5.vue';
import step6 from './components/step-6.vue';

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

function readInput(e){
  text.value = e.target.value;
}

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
  <step1 :name="name" :colorClass="colorClass"></step1>
  <hr />
  <step2 :count="count" v-on:addCount="addCount"></step2>
  <hr />
  <step3 :text="text" v-on:readInput="readInput"></step3>
  <hr />
  <step4 v-model="text"></step4>
  <hr />
  <step5 :flag="flag" v-on:toggle="toggle"></step5>
  <hr />
  <step6 v-model="newTodo" :todos="todos" v-on:addTodo="addTodo" v-on:removeTodo="removeTodo"></step6>
</template>

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