<template>
  <div class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <header class="w-full bg-white/80 backdrop-blur-sm border-b border-gray-200/50 shadow-sm sticky top-0 z-30">
      <nav class="max-w-7xl mx-auto flex items-center justify-between h-14 px-4">
        <router-link to="/" class="flex items-center space-x-2 group">
          <div class="relative w-8 h-8 flex items-center justify-center">
            <img 
              src="/Élégance Parfum Logo Design.png" 
              alt="Elégance Parfum Logo" 
              class="h-7 w-7 transition-transform duration-300 group-hover:scale-110" 
            />
          </div>
          <span class="font-semibold text-lg tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
            Elégance Parfum
          </span>
        </router-link>
        <div class="flex items-center space-x-8">
          <router-link 
            v-for="(link, index) in navLinks" 
            :key="index"
            :to="link.path"
            class="relative text-gray-700 font-medium hover:text-blue-600 transition-colors duration-300 group"
          >
            {{ link.name }}
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
          </router-link>
          <router-link 
            to="/cart"
            class="relative text-gray-700 hover:text-blue-600 transition-colors duration-300 group"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A1 1 0 007.5 17h9a1 1 0 00.9-.55L21 13M7 13V6a1 1 0 011-1h5m-6 8a2 2 0 100 4 2 2 0 000-4zm10 0a2 2 0 100 4 2 2 0 000-4z" />
            </svg>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
          </router-link>
        </div>
      </nav>
    </header>
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 py-8">
      <router-view />
    </main>
    <footer class="w-full bg-white/80 backdrop-blur-sm border-t border-gray-200/50 py-6 text-center">
      <p class="text-gray-500 text-sm bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
        &copy; 2025 Elégance Parfum. All rights reserved.
      </p>
    </footer>
  </div>
</template>

<script setup>
const navLinks = [
  { name: 'Home', path: '/' },
  { name: 'Perfumes', path: '/products' },
  { name: 'Login', path: '/login' },
  { name: 'Register', path: '/register' }
];
</script>

<style scoped>
.router-link-active {
  @apply text-blue-600;
}

.router-link-active::after {
  @apply w-full;
}
</style> 