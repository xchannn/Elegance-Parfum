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
    <div class="relative container mx-auto px-4 py-8">
      <!-- Search Section -->
      <section class="flex flex-col items-center justify-center text-center py-4 mb-12">
        <div class="relative w-full max-w-2xl" data-aos="fade-in" data-aos-duration="3000">
          <input 
            type="text" 
            v-model="searchQuery"
            placeholder="Search for your perfect fragrance..."
            class="w-full px-6 py-4 text-lg bg-white/80 backdrop-blur-sm border-2 border-gray-200 rounded-full shadow-lg focus:outline-none focus:border-gray-400 transition-all duration-300"
          />
          <div class="absolute right-4 top-1/2 transform -translate-y-1/2 flex items-center">
            <div v-if="isLoading" class="mr-2">
              <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>
      </section>

      <!-- Perfume Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <ProductCard 
          v-for="(product, index) in filteredProducts" 
          :key="product.id" 
          :product="product" 
          data-aos="fade-in" 
          :data-aos-duration="3000" 
          :data-aos-delay="index * 100" 
          class="h-full"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch, onUnmounted } from 'vue';
import axios from 'axios';
import ProductCard from '../components/ProductCard.vue';
import debounce from 'lodash/debounce';

const searchQuery = ref('');
const isLoading = ref(false);
const allProducts = ref([
  {
    id: 1,
    name: 'Dior Sauvage',
    description: 'Wild. Fresh. Iconic. Discover the essence of modern masculinity.',
    price: 5999.99,
    image: '/DiorSauvage.jpg'
  },
  {
    id: 2,
    name: 'Versace Eros',
    description: 'A sensual, fresh oriental fragrance that embodies strength and passion.',
    price: 5499.99,
    image: '/Versace.jpg'
  },
  {
    id: 3,
    name: 'Chanel N°5',
    description: 'The timeless classic that revolutionized the world of perfumery.',
    price: 7999.99,
    image: '/Chanel N°5.jpg'
  },
  {
    id: 4,
    name: 'Tom Ford Black Orchid',
    description: 'A luxurious oriental fragrance with dark, mysterious undertones.',
    price: 8999.99,
    image: '/Tom Ford Black Orchid.jpg'
  },
  {
    id: 5,
    name: 'YSL Black Opium',
    description: 'An addictive gourmand fragrance with coffee and vanilla notes.',
    price: 6999.99,
    image: '/YSL.jpg'
  },
  {
    id: 6,
    name: 'Creed Aventus',
    description: 'A bold, fruity fragrance with pineapple and birch notes.',
    price: 24999.99,
    image: '/creed.jpg'
  }
]);

// Computed property for filtered products
const filteredProducts = computed(() => {
  if (!searchQuery.value) return allProducts.value;
  
  const query = searchQuery.value.toLowerCase();
  return allProducts.value.filter(product => 
    product.name.toLowerCase().includes(query) ||
    product.description.toLowerCase().includes(query)
  );
});

// Debounced search function
const debouncedSearch = debounce(async (query) => {
  if (!query) return;
  
  isLoading.value = true;
  try {
    const response = await axios.get(`/api/products/search?q=${encodeURIComponent(query)}`);
    if (response.data && response.data.length > 0) {
      allProducts.value = response.data;
    }
  } catch (error) {
    console.error('Error searching products:', error);
  } finally {
    isLoading.value = false;
  }
}, 300);

// Watch for changes in search query
watch(searchQuery, (newQuery) => {
  debouncedSearch(newQuery);
});

// Clean up debounced function on component unmount
onUnmounted(() => {
  debouncedSearch.cancel();
});
</script>

<style scoped>
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

input::placeholder {
  color: #94a3b8;
}

input:focus::placeholder {
  color: #64748b;
}
</style> 