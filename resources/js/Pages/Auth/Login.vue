<script setup>
import { ref } from 'vue';
import axios from 'axios';

const email = ref('');
const password = ref('');

async function login() {
  try {
    await axios.post('/login', { email: email.value, password: password.value });
    window.location.href = '/';
  } catch (e) {
    alert('Login failed');
  }
}
</script>

<template>
  <div class="flex justify-center py-16">
    <div class="bg-white rounded-2xl shadow-lg p-10 w-full max-w-md" data-aos="fade-up">
      <h1 class="text-3xl font-bold mb-6">Login</h1>
      <form @submit.prevent="login">
        <div class="mb-6">
          <label class="block mb-2 font-medium">Email</label>
          <input v-model="email" type="email" class="w-full border rounded px-3 py-2" required />
        </div>
        <div class="mb-6">
          <label class="block mb-2 font-medium">Password</label>
          <input v-model="password" type="password" class="w-full border rounded px-3 py-2" required />
        </div>
        <button class="bg-blue-600 text-white px-6 py-3 rounded-full font-semibold text-lg w-full">Login</button>
      </form>
    </div>
  </div>
</template>
