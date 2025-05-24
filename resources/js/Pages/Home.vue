<template>
  <div class="min-h-screen relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-purple-50"></div>
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-20 left-20 w-48 h-48 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
      <div class="absolute top-40 right-20 w-48 h-48 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
      <div class="absolute bottom-20 left-1/2 w-48 h-48 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Content -->
    <div class="relative max-w-5xl mx-auto px-4 pt-8 pb-8">
      <!-- Hero Section -->
      <section class="text-center max-w-3xl mx-auto">
        <div class="mb-4" data-aos="fade-up" data-aos-delay="5000">
          <h4 class="text-5xl md:text-6xl font-extrabold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
            Elegance Parfum
          </h4>
        </div>

        <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed" data-aos="fade-up" data-aos-delay="5000">
          Discover our collection of exquisite fragrances that capture the essence of elegance and sophistication
        </p>

        <!-- CTA Button -->
        <div class="flex flex-col items-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="5000">
          <button @click="$router.push('/products')" 
                  class="group relative px-10 py-3 rounded-full font-semibold text-lg overflow-hidden mb-6">
            <span class="absolute inset-0 w-full h-full transition duration-300 ease-out transform translate-x-0 bg-blue-600 group-hover:translate-x-full"></span>
            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-600 to-purple-600 opacity-0 group-hover:opacity-100 transition duration-300 ease-out"></span>
            <span class="relative text-white">Explore Collection</span>
          </button>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="p-4 rounded-xl bg-white/50 backdrop-blur-sm shadow-lg" data-aos="fade-up" data-aos-delay="5000">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-3">
              <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <h3 class="text-base font-semibold mb-1">Authentic Products</h3>
            <p class="text-sm text-gray-600">100% genuine perfumes from top luxury brands</p>
          </div>

          <div class="p-4 rounded-xl bg-white/50 backdrop-blur-sm shadow-lg" data-aos="fade-up" data-aos-delay="5000">
            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mb-3">
              <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-base font-semibold mb-1">Fast Delivery</h3>
            <p class="text-sm text-gray-600">Quick and secure shipping</p>
          </div>

          <div class="p-4 rounded-xl bg-white/50 backdrop-blur-sm shadow-lg" data-aos="fade-up" data-aos-delay="5000">
            <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mb-3">
              <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
              </svg>
            </div>
            <h3 class="text-base font-semibold mb-1">Satisfaction Guaranteed</h3>
            <p class="text-sm text-gray-600">30-day money-back guarantee</p>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap');

.playfair {
  font-family: 'Playfair Display', serif;
}

.animate-blob {
  animation: blob 7s infinite;
}

.animation-delay-2000 {
  animation-delay: 2s;
}

.animation-delay-4000 {
  animation-delay: 4s;
}

@keyframes blob {
  0% {
    transform: translate(0px, 0px) scale(1);
  }
  33% {
    transform: translate(30px, -50px) scale(1.1);
  }
  66% {
    transform: translate(-20px, 20px) scale(0.9);
  }
  100% {
    transform: translate(0px, 0px) scale(1);
  }
}
</style> 