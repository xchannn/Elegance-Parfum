<template>
  <div class="flex justify-center py-16">
    <div v-if="product" class="max-w-2xl w-full bg-white rounded-2xl shadow-lg p-10" data-aos="fade-up">
      <img :src="product.image" class="w-full h-72 object-cover rounded-xl mb-6" />
      <h1 class="text-3xl font-bold mb-2">{{ product.name }}</h1>
      <p class="text-gray-600 mb-4">{{ product.description }}</p>
      <div class="text-2xl font-semibold mb-6">{{ currency(product.price) }}</div>
      <button class="bg-blue-600 text-white px-6 py-3 rounded-full font-semibold text-lg shadow hover:bg-blue-700 transition" @click="addToCart">Add to Cart</button>
    </div>
    <div v-else>Loading...</div>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';
import { currency } from '../utils/format.js';

const route = useRoute();
const product = ref(null);
onMounted(async () => {
  const res = await axios.get(`/api/products/${route.params.id}`);
  product.value = res.data;
});

function addToCart() {
  // Add to cart logic here
  alert('Added to cart!');
}
</script> 