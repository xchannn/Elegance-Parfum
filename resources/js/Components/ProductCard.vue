<template>
  <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 group" data-aos="fade-up">
    <div class="relative h-72 overflow-hidden bg-gradient-to-br from-blue-50 to-purple-50">
      <img 
        :src="product.image" 
        :alt="product.name" 
        class="w-full h-full object-contain p-4 transition-transform duration-300 group-hover:scale-105"
      />
    </div>
    <div class="p-6">
      <h2 class="text-2xl font-bold mb-2 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">{{ product.name }}</h2>
      <p class="text-gray-600 mb-4 line-clamp-2">{{ product.description }}</p>
      <div class="flex justify-between items-center">
        <p class="text-xl font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">{{ currency(product.price) }}</p>
        <button 
          @click.stop="addToCart" 
          class="group relative px-8 py-2 rounded-full font-semibold text-white overflow-hidden"
        >
          <span class="absolute inset-0 w-full h-full transition duration-300 ease-out transform translate-x-0 bg-blue-600 group-hover:translate-x-full"></span>
          <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-600 to-purple-600 opacity-0 group-hover:opacity-100 transition duration-300 ease-out"></span>
          <span class="relative">Buy Now</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { currency } from '../utils/format.js';
import { defineProps } from 'vue';

const props = defineProps(['product']);

const addToCart = () => {
  // TODO: Implement add to cart functionality
  console.log('Adding to cart:', props.product);
};
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
</style> 