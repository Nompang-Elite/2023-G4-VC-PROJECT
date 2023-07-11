import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import("@/views/HomeView.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () => import("@/views/Auth/RegisterView.vue"),
  },

  {
    path: '/login',
    name: 'Login',
    component: () => import("@/views/Auth/LoginView.vue"),
  }
  {
      path: "/hotel",
      component: () => import("@/views/AboutView.vue"),
    },
];
  

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
