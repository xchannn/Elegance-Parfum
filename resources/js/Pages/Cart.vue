<template>
  <div class="flex justify-center py-16">
    <div class="bg-white rounded-2xl shadow-lg p-10 w-full max-w-4xl" data-aos="fade-up">
      <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>
      
      <div v-if="cart.items.length === 0" class="bg-gray-100 rounded p-4 mb-6 text-center">
        No items in cart yet.
      </div>

      <div v-else>
        <!-- Cart Items -->
        <div class="space-y-4 mb-8">
          <div v-for="item in cart.items" :key="item.id" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
            <img :src="item.image" :alt="item.name" class="w-20 h-20 object-cover rounded" />
            <div class="flex-1">
              <h3 class="font-semibold">{{ item.name }}</h3>
              <p class="text-gray-600">{{ currency(item.price) }}</p>
            </div>
            <div class="flex items-center gap-2">
              <button 
                @click="updateQuantity(item.id, item.quantity - 1)"
                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300"
                :disabled="item.quantity <= 1"
              >-</button>
              <span class="w-8 text-center">{{ item.quantity }}</span>
              <button 
                @click="updateQuantity(item.id, item.quantity + 1)"
                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300"
              >+</button>
            </div>
            <button 
              @click="removeItem(item.id)"
              class="text-red-600 hover:text-red-800"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Cart Summary -->
        <div class="bg-gray-50 rounded-lg p-6 mb-6">
          <div class="flex justify-between mb-4">
            <span class="font-semibold">Subtotal:</span>
            <span>{{ currency(cart.totalAmount) }}</span>
          </div>
          <div class="flex justify-between mb-4">
            <span class="font-semibold">Shipping:</span>
            <span>Calculated at checkout</span>
          </div>
          <div class="flex justify-between text-lg font-bold">
            <span>Total:</span>
            <span>{{ currency(cart.totalAmount) }}</span>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4">
          <button 
            @click="router.push('/products')"
            class="flex-1 bg-gray-200 text-gray-800 px-6 py-3 rounded-full font-semibold hover:bg-gray-300 transition"
          >
            Continue Shopping
          </button>
          <button 
            @click="router.push('/checkout')"
            class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition"
          >
            Proceed to Checkout
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useCartStore } from '../stores/cart';
import { useRouter } from 'vue-router';
import { currency } from '../utils/format.js';
import { onMounted } from 'vue';

const cart = useCartStore();
const router = useRouter();

onMounted(() => {
  cart.loadFromLocalStorage();
});

const updateQuantity = (productId, quantity) => {
  if (quantity > 0) {
    cart.updateQuantity(productId, quantity);
  }
};

const removeItem = (productId) => {
  cart.removeItem(productId);
};
</script> 