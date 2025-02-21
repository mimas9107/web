<template>
  <section :style="{ width: sectionWidth + '%' }">
    <ArticleComponent v-for="n in columns" :key="n" />
  </section>
</template>

<script>
export default {
  components: {
    ArticleComponent: Vue.defineAsyncComponent(() => loadModule('/components/article.vue', window.loaderOptions))
  },
  props: {
    columns: Number,
    sectionWidth: Number
  }
};
</script>
