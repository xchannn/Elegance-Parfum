<template>
  <div class="min-h-screen flex flex-col bg-gradient-to-b from-blue-50 to-white">
    <header class="w-full bg-white/80 backdrop-blur border-b border-gray-200 shadow-sm sticky top-0 z-30">
      <nav class="max-w-7xl mx-auto flex items-center justify-between h-16 px-4">
        <div class="flex items-center space-x-4">
          <img src="/Élégance Parfum Logo Design.png" alt="Elégance Parfum Logo" class="h-8 w-8 mr-2" />
          <span class="font-semibold text-xl tracking-tight text-gray-900">Elégance Parfum</span>
        </div>
        <div class="flex items-center space-x-6 text-gray-700 font-medium">
          <router-link to="/" class="hover:text-blue-600 transition">Home</router-link>
          <router-link to="/products" class="hover:text-blue-600 transition">Perfumes</router-link>
          <router-link to="/cart" class="hover:text-blue-600 transition">Cart</router-link>
          <router-link to="/login" class="hover:text-blue-600 transition">Login</router-link>
          <router-link to="/register" class="hover:text-blue-600 transition">Register</router-link>
        </div>
      </nav>
    </header>
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 py-8">
      <router-view />
    </main>
    <footer class="w-full bg-white/80 border-t border-gray-200 py-6 text-center text-gray-500 text-sm">
      &copy; 2025 Elégance Parfum. All rights reserved.
    </footer>
  </div>
</template>
<script setup>
// No script needed for layout
</script> 