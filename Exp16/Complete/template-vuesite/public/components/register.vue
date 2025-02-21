<template>
  <div>
    <section style="width:100%">
      <h2>Register</h2>
      <form action="/auth/register" method="POST">
        <label>Username:</label>
        <input type="text" name="username" class="form-control" required />
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required />
        <label>Password:</label>
        <input type="password" name="password" class="form-control" required />
        <button type="submit" class="btn btn-primary" >Register</button>
      </form>
    </section>
  </div>
</template>
