import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '@/views/auth/LoginView.vue';
import Dashboard from '@/views/dashboard/Dashboard.vue';
import { useAuthStore } from '@/stores/auth';

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: LoginView,
  },
  {
    path: '/forgotpassword',
    name: 'Forgot Password',
    component: () => import('@/views/auth/ForgetPassword.vue'),
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    meta: { requiresAuth: true },
  },

];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

// Global route guard
router.beforeEach(async (to, from, next) => {
  const auth = useAuthStore(); // Access the store inside the route guard
  const isAuthenticated = localStorage.getItem('auth') !== null; // Check if the user is logged in

  // Check authentication status in the store if user is logged in
  if (isAuthenticated) {
    await auth.checkAuth();
  }

  // Redirect authenticated users away from the login page
  if (to.name === 'Login' && isAuthenticated) {
    return next({ path: '/dashboard' }); // Redirect to the dashboard if already authenticated
  }

  // Protect all routes that require authentication
  if (to.meta.requiresAuth && !auth.isAuthenticated) {
    return next({ path: '/login' }); // Redirect to login if not authenticated
  }

  next(); // Proceed to the route if no redirect is needed
});

export default router;
