<script setup>
import { ref } from 'vue';
import axios from 'axios';

const name = ref('');
const email = ref('');
const password = ref('');

async function register() {
  try {
    await axios.post('/register', { name: name.value, email: email.value, password: password.value });
    window.location.href = '/login';
  } catch (e) {
    alert('Registration failed');
  }
}
</script>

<template>
  <div class="flex justify-center py-16">
    <div class="bg-white rounded-2xl shadow-lg p-10 w-full max-w-md" data-aos="fade-up">
      <h1 class="text-3xl font-bold mb-6">Register</h1>
      <form @submit.prevent="register">
        <div class="mb-6">
          <label class="block mb-2 font-medium">Name</label>
          <input v-model="name" type="text" class="w-full border rounded px-3 py-2" required />
        </div>
        <div class="mb-6">
          <label class="block mb-2 font-medium">Email</label>
          <input v-model="email" type="email" class="w-full border rounded px-3 py-2" required />
        </div>
        <div class="mb-6">
          <label class="block mb-2 font-medium">Password</label>
          <input v-model="password" type="password" class="w-full border rounded px-3 py-2" required />
        </div>
        <button class="bg-green-600 text-white px-6 py-3 rounded-full font-semibold text-lg w-full">Register</button>
      </form>
    </div>
  </div>
</template>
