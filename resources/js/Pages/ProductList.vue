<template>
  <div class="py-16">
    <h1 class="text-4xl font-bold mb-8 text-center" data-aos="fade-up">All Perfumes</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
      <ProductCard v-for="product in products" :key="product.id" :product="product" />
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import ProductCard from '../components/ProductCard.vue';

const products = ref([]);
onMounted(async () => {
  const res = await axios.get('/api/products');
  products.value = res.data;
});
</script> 