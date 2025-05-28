<template>
  <div class="flex justify-center py-16">
    <div class="bg-white rounded-2xl shadow-lg p-10 w-full max-w-lg text-center" data-aos="fade-up">
      <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
      </div>
      
      <h1 class="text-3xl font-bold mb-4">Order Placed Successfully!</h1>
      <p class="text-gray-600 mb-6">Thank you for your purchase. Your order has been received.</p>
      
      <div class="bg-gray-50 rounded-lg p-6 mb-6">
        <p class="font-semibold mb-2">Order Number:</p>
        <p class="text-blue-600 font-mono">{{ orderNumber }}</p>
      </div>
      
      <p class="text-gray-600 mb-6">We'll send you an email confirmation with your order details.</p>
      
      <div class="flex gap-4 justify-center">
        <button 
          @click="router.push('/products')"
          class="bg-blue-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-700 transition"
        >
          Continue Shopping
        </button>
        <button 
          @click="router.push('/orders')"
          class="bg-white border border-blue-600 text-blue-600 px-6 py-2 rounded-full font-semibold hover:bg-blue-50 transition"
        >
          View Orders
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();
const orderNumber = route.params.orderNumber;
</script> 