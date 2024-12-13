<script setup>
// 原本 Vite工具產生
//import HelloWorld from './components/HelloWorld.vue'
//import TheWelcome from './components/TheWelcome.vue'

import { ref } from 'vue';
// 讀取Component內容
import step1 from './components/step-1.vue';
import step2 from './components/step-2.vue';
import step3 from './components/step-3.vue';
import step4 from './components/step-4.vue';
import step5 from './components/step-5.vue';
import step6 from './components/step-6.vue';
// 以ref()產生渲染(Rendering)資料所需的變數
const name = ref("John");
const colorClass = ref("myColor");
let count = ref(0);
let text = ref("");
let flag = ref(true);
let id = 0;
let newTodo = ref("");
let todos = ref([
  { id: id++, text: "Learn HTML" },
  { id: id++, text: "Learn JavaScript" },
  { id: id++, text: "Learn Vue" },
]);
// 因應相關動作設定的function
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
  <step2 :count="count" @addCount="addCount"></step2>
  <hr />
  <step3 :text="text" @readInput="readInput"></step3>
  <hr />
  <step4 v-model="text" ></step4>
  <hr />
  <step5 :flag="flag" @toggle="toggle"></step5>
  <hr />
  <step6 v-model="newTodo" :todos="todos" @addTodo="addTodo" @removeTodo="removeTodo"></step6>
  <!-- 原本 Vite工具產生
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div>
  </header>

  <main>
    <TheWelcome />
  </main>
  -->
</template>

<!-- 原本 Vite工具產生
<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
 -->