<template>
  <div>
    <section>
      <h2>Login</h2>
      <form action="/auth/login" method="POST">
        <label>Username:</label>
        <input type="text" name="username" class="form-control" required />
        <label>Password:</label>
        <input type="password" name="password" class="form-control" required />
        <button type="submit" class="btn btn-primary">Login</button>
        <p>Otherwise, go to <a href="/register">REGISTER FIRST!</a></p>
      </form>
    </section>
  </div>
</template>

<script>
export default {
  components: {
    HeaderComponent: Vue.defineAsyncComponent(() => loadModule('/components/header.vue', window.loaderOptions)),
    FooterComponent: Vue.defineAsyncComponent(() => loadModule('/components/footer.vue', window.loaderOptions))
  }
};
</script>
