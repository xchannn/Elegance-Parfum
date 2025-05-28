import { createRouter, createWebHistory } from 'vue-router';
import Home from '../Pages/Home.vue';
import ProductList from '../Pages/ProductList.vue';
import ProductDetail from '../Pages/ProductDetail.vue';
import Cart from '../Pages/Cart.vue';
import Checkout from '../Pages/Checkout.vue';
import Login from '../Pages/Auth/Login.vue';
import Register from '../Pages/Auth/Register.vue';
import OrderSuccess from '../Pages/OrderSuccess.vue';

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/products', name: 'products', component: ProductList },
  { path: '/products/:id', name: 'product-detail', component: ProductDetail },
  { path: '/cart', name: 'cart', component: Cart },
  { path: '/checkout', name: 'checkout', component: Checkout },
  { path: '/login', name: 'login', component: Login },
  { path: '/register', name: 'register', component: Register },
  { path: '/order-success/:orderNumber', name: 'order-success', component: OrderSuccess },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router; 