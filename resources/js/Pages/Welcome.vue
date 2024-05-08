<template>
  <div class="min-h-screen flex items-center justify-center">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow-md">
      <h1 class="text-3xl font-semibold mb-6">Welcome to My Website</h1>

      <div class="mb-4">
        <button
          @click="goToLogin"
          class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        >
          Login
        </button>
      </div>

      <div>
        <button
          @click="goToRegister"
          class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        >
          Register
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    goToLogin() {
      // Redirect to the login route
      this.$router.push({ name: 'login' });
    },
    goToRegister() {
      // Redirect to the register route
      this.$router.push({ name: 'register' });
    },
  },
};
</script>

<style>
/* Add custom styles here */
</style>
