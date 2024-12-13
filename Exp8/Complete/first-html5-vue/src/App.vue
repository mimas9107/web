<template>
  <myHeader />
  <section>
    <!-- 將來主要頁面內容替換之處 -->
    <RouterView></RouterView>
  </section>
  <myAside />
  <myFooter />
</template>

<script setup>
// 這裡使用 Vue.JS 的寫法 (script標籤後要加上 setup)
// 所以，使用import，和HTML那邊寫法不同
//import { ref } from 'vue';

// 示範讀取Component內容
import myHeader from './components/myHeader.vue';
import myAside from './components/myAside.vue';
import myFooter from './components/myFooter.vue';

// 以ref()產生渲染(Rendering)資料所需的變數

// 因應相關動作設定的function
</script>

<style src="./pcRWD.css"></style>
