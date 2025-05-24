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
      <div class="flex justify-between items-center mb-4">
        <p class="text-xl font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">{{ currency(product.price) }}</p>
      </div>
      <div class="flex gap-3">
        <button 
          @click.stop="addToCart" 
          class="flex items-center gap-2 bg-white border border-blue-600 text-blue-600 px-5 py-2 rounded-full font-semibold hover:bg-blue-50 transition-colors duration-300 hover:shadow-md"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A1 1 0 007.5 17h9a1 1 0 00.9-.55L21 13M7 13V6a1 1 0 011-1h5m-6 8a2 2 0 100 4 2 2 0 000-4zm10 0a2 2 0 100 4 2 2 0 000-4z" />
          </svg>
          Add to Cart
        </button>
        <button 
          @click.stop="buyNow" 
          class="group relative px-6 py-2 rounded-full font-semibold text-white overflow-hidden"
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

const buyNow = () => {
  // TODO: Implement buy now functionality (e.g., redirect to checkout with this product)
  console.log('Buying now:', props.product);
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