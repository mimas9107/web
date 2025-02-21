<template>
  <div>
    <ArticleComponent />
    <ArticleComponent />
  </div>
</template>

<script>
export default {
  components: {
    ArticleComponent: () => loadModule('/components/article.vue', window.loaderOptions)
  }
};
</script>
