<template>
  <article :style="{ width: 100 / columns + '%' }">
    <h3>Article</h3>
    <p>This is dynamically generated.</p>
  </article>
</template>

<script>
export default {
  props: {
    columns: Number
  }
};
</script>
