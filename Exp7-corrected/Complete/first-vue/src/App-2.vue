<script setup>
// 這裡使用 Vue.JS 的寫法 (script標籤後要加上 setup)
// 所以，使用import，和HTML那邊寫法不同
import { ref } from 'vue';

// 將之前各Step的內容，改寫獨立成不同的Component
// 這裡示範讀取Component內容
import step1 from './components/step-1.vue';
import step2 from './components/step-2.vue';
import step3 from './components/step-3.vue';
import step4 from './components/step-4.vue';
import step5 from './components/step-5.vue';
import step6 from './components/step-6.vue';

// 以下內容原本是寫在createApp()下的setup()裡面
// 而在Vue.JS的Component內，<script setup>就類似是在setup()裡撰寫，但還是有些語法不同之處
// 
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

// [在HTML內] 因改成使用 v-model 取代 v-bind，故不需要此function
//
// 在這裡，我們刻意示範兩者，故此function被解開marked
function readInput(e) {
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

// 之前在HTML撰寫時，在setup()的最後要透過 return 回傳相關變數與Function
// 在Vue.JS的Component內，則不需要
</script>

<!-- Vue.JS元件插入HTML之處 -->
<!-- 在<template>的內容就是將來會插入的HTML內容 -->
<!--  -->
<!-- 承襲前面已讀取各Component，這裡將各Component放入HTML中 -->
<!--  -->
<!-- 對照之前，這裡刻意示範 v-bind (:) & v-on (@) 另一種表達方式 -->
<template>
  <step1 :name="name" :colorClass="colorClass"></step1>
  <hr />
  <step2 :count="count" @addCount="addCount"></step2>
  <hr />
  <step3 :text="text" @readInput="readInput"></step3>
  <hr />
  <step4 v-model="text"></step4>
  <hr />
  <step5 :flag="flag" @toggle="toggle"></step5>
  <hr />
  <step6 v-model="newTodo" :todos="todos" @addTodo="addTodo" @removeTodo="removeTodo"></step6>
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