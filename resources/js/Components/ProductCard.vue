<template>
  <div class="bg-white/90 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up">
    <div class="relative h-72 overflow-hidden">
      <img 
        :src="product.image" 
        :alt="product.name" 
        class="w-full h-full object-contain p-4 bg-gradient-to-b from-gray-50 to-gray-100"
      />
    </div>
    <div class="p-6">
      <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ product.name }}</h2>
      <p class="text-gray-600 mb-4 line-clamp-2">{{ product.description }}</p>
      <div class="flex justify-between items-center">
        <p class="text-xl font-semibold text-blue-600">{{ currency(product.price) }}</p>
        <button 
          @click.stop="addToCart" 
          class="bg-blue-600 text-white px-8 py-2 rounded-full font-semibold hover:bg-blue-700 transition-colors duration-300 hover:shadow-md"
        >
          Buy Now
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
</style> 