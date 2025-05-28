<script setup>
import { ref } from 'vue';
import axios from 'axios';

const name = ref('');
const email = ref('');
const password = ref('');
const showPassword = ref(false);

async function register() {
  try {
    await axios.post('/register', { name: name.value, email: email.value, password: password.value });
    window.location.href = '/login';
  } catch (e) {
    console.error('Registration failed:', e);
    alert('Registration failed');
  }
}

function toggleShowPassword() {
  showPassword.value = !showPassword.value;
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
        <div class="mb-6 relative">
          <label class="block mb-2 font-medium">Password</label>
          <input 
            v-model="password"
            :type="showPassword ? 'text' : 'password'"
            class="w-full border rounded px-3 py-2 pr-10" 
            required 
          />
          <span 
            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
            @click="toggleShowPassword"
            style="top: 1.8rem;"
          >
            <svg v-if="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.956 9.956 0 011.563-2.053m1.039-1.316A8.003 8.003 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.137 5.772M9 11a3 3 0 116 0 3 3 0 01-6 0zm1.293 8.707L20.707 9.293c-.451-.451-.902-.879-1.32-.658l-5.59 5.59a3 3 0 01-4.243 0L4.808 12.004c-.451-.451-.879-.902-.658-1.32l1.286-1.286a1 1 0 011.414 0l.707.707a1 1 0 001.414 0L12 9.414l1.707-1.707a1 1 0 011.414 0z" />
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </span>
        </div>
        <button class="bg-green-600 text-white px-6 py-3 rounded-full font-semibold text-lg w-full">Register</button>
      </form>
    </div>
  </div>
</template>
