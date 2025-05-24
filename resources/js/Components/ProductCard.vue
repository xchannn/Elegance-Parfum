<template>
  <div class="rounded-2xl shadow-lg bg-white p-6 hover:shadow-2xl transition cursor-pointer flex flex-col items-center" @click="$router.push(`/products/${product.id}`)" data-aos="fade-in">
    <img :src="product.image" class="w-full h-48 object-cover rounded-xl mb-4" />
    <h3 class="font-semibold text-xl mb-1">{{ product.name }}</h3>
    <p class="text-gray-500 text-lg">{{ currency(product.price) }}</p>
  </div>
</template>
<script setup>
import { currency } from '../utils/format.js';
defineProps(['product']);
</script> 