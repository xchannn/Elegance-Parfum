<template>
  <section class="flex flex-col items-center justify-center text-center py-4">
    <h2 class="text-5xl md:text-6xl font-extrabold mb-4" data-aos="fade-up">Dior Sauvage</h2>
    <p class="text-xl md:text-2xl text-gray-600 mb-6" data-aos="fade-up" data-aos-delay="100">Wild. Fresh. Iconic. Discover the essence of modern masculinity.</p>
    <img src="/DiorSauvage.jpg" alt="Dior Sauvage Perfume" class="w-full max-w-xs rounded-xl shadow-lg mb-10" data-aos="fade-in" data-aos-delay="300" />
    <div class="flex space-x-4" data-aos="fade-up" data-aos-delay="200">
      <button class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold text-lg shadow hover:bg-blue-700 transition">Learn More</button>
      <button class="border border-blue-600 text-blue-600 px-8 py-3 rounded-full font-semibold text-lg hover:bg-blue-50 transition">Buy</button>
    </div>
    <div class="mt-10 text-lg text-gray-400" data-aos="fade-up" data-aos-delay="400">Built for Perfume Lovers.</div>
  </section>
</template>
<script setup>
import { ref } from 'vue';

const sectionStyle = ref({
  marginTop: '10px'
});
</script> 