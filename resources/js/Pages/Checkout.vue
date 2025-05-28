<template>
  <div class="flex justify-center py-16">
    <div class="bg-white rounded-2xl shadow-lg p-10 w-full max-w-4xl" data-aos="fade-up">
      <h1 class="text-3xl font-bold mb-6">Checkout</h1>

      <!-- Authentication Check -->
      <div v-if="!isAuthenticated" class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold text-blue-800 mb-2">Please Sign In or Register</h2>
        <p class="text-blue-600 mb-4">To complete your purchase, you need to sign in or create an account.</p>
        <div class="flex gap-4">
          <button 
            @click="router.push('/login')"
            class="bg-blue-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-700 transition"
          >
            Sign In
          </button>
          <button 
            @click="router.push('/register')"
            class="bg-white border border-blue-600 text-blue-600 px-6 py-2 rounded-full font-semibold hover:bg-blue-50 transition"
          >
            Register
          </button>
        </div>
      </div>

      <div v-else>
        <!-- Order Summary -->
        <div class="mb-8">
          <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
          <div class="space-y-4">
            <div v-for="item in cart.items" :key="item.id" class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
              <img :src="item.image" :alt="item.name" class="w-16 h-16 object-cover rounded" />
              <div class="flex-1">
                <h3 class="font-semibold">{{ item.name }}</h3>
                <p class="text-gray-600">Quantity: {{ item.quantity }}</p>
              </div>
              <p class="font-semibold">{{ currency(item.price * item.quantity) }}</p>
            </div>
          </div>
        </div>

        <!-- Checkout Form -->
        <form @submit.prevent="submitOrder" class="space-y-6">
          <!-- Shipping Information -->
          <div class="space-y-4">
            <h2 class="text-xl font-semibold">Shipping Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block mb-2 font-medium">Full Name</label>
                <input v-model="form.shippingName" type="text" class="w-full border rounded px-3 py-2" required />
              </div>
              <div>
                <label class="block mb-2 font-medium">Phone Number</label>
                <input v-model="form.phone" type="tel" class="w-full border rounded px-3 py-2" required />
              </div>
              <div class="md:col-span-2">
                <label class="block mb-2 font-medium">Email</label>
                <input v-model="form.email" type="email" class="w-full border rounded px-3 py-2" required />
              </div>
              <div class="md:col-span-2">
                <label class="block mb-2 font-medium">Shipping Address</label>
                <textarea v-model="form.shippingAddress" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
              </div>
            </div>
          </div>

          <!-- Payment Information -->
          <div class="space-y-4">
            <h2 class="text-xl font-semibold">Payment Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block mb-2 font-medium">Card Number</label>
                <input v-model="form.cardNumber" type="text" class="w-full border rounded px-3 py-2" required />
              </div>
              <div>
                <label class="block mb-2 font-medium">Card Holder Name</label>
                <input v-model="form.cardName" type="text" class="w-full border rounded px-3 py-2" required />
              </div>
              <div>
                <label class="block mb-2 font-medium">Expiry Date</label>
                <input v-model="form.expiryDate" type="text" placeholder="MM/YY" class="w-full border rounded px-3 py-2" required />
              </div>
              <div>
                <label class="block mb-2 font-medium">CVV</label>
                <input v-model="form.cvv" type="text" class="w-full border rounded px-3 py-2" required />
              </div>
            </div>
          </div>

          <!-- Order Summary -->
          <div class="bg-gray-50 rounded-lg p-6">
            <div class="flex justify-between mb-4">
              <span class="font-semibold">Subtotal:</span>
              <span>{{ currency(cart.totalAmount) }}</span>
            </div>
            <div class="flex justify-between mb-4">
              <span class="font-semibold">Shipping:</span>
              <span>Free</span>
            </div>
            <div class="flex justify-between text-lg font-bold">
              <span>Total:</span>
              <span>{{ currency(cart.totalAmount) }}</span>
            </div>
          </div>

          <!-- Submit Button -->
          <button 
            type="submit"
            class="w-full bg-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition"
            :disabled="isSubmitting"
          >
            {{ isSubmitting ? 'Processing...' : 'Place Order' }}
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useCartStore } from '../stores/cart';
import { useRouter } from 'vue-router';
import { currency } from '../utils/format.js';
import axios from 'axios';

const cart = useCartStore();
const router = useRouter();
const isSubmitting = ref(false);

// Check if user is authenticated
const isAuthenticated = computed(() => {
  return document.cookie.includes('XSRF-TOKEN');
});

const form = ref({
  shippingName: '',
  phone: '',
  email: '',
  shippingAddress: '',
  cardNumber: '',
  cardName: '',
  expiryDate: '',
  cvv: ''
});

const submitOrder = async () => {
  try {
    isSubmitting.value = true;
    
    // Create order
    const orderData = {
      items: cart.items.map(item => ({
        product_id: item.id,
        quantity: item.quantity,
        price: item.price
      })),
      total_amount: cart.totalAmount,
      shipping_address: form.value.shippingAddress,
      billing_address: form.value.shippingAddress, // Using shipping address as billing address
      phone: form.value.phone,
      email: form.value.email,
      payment_method: 'credit_card',
      notes: ''
    };

    const response = await axios.post('/api/orders', orderData);
    
    // Clear cart after successful order
    cart.clearCart();
    
    // Redirect to success page or show success message
    router.push(`/order-success/${response.data.order_number}`);
  } catch (error) {
    console.error('Error placing order:', error);
    alert('There was an error processing your order. Please try again.');
  } finally {
    isSubmitting.value = false;
  }
};
</script> 