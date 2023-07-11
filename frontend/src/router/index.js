import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: "/",
    component: () => import("@/views/HomeView.vue"),
  },
  {
    path: "/hotel",
    component: () => import("@/views/AboutView.vue"),
  },
  // {
  //   path: "/service",
  //   component: () => import("@/views/ServiceView.vue"),
  // },
  // {
  //   path: "/login",
  //   component: () => import("@/views/LogIn.vue"),
  // },
  // {
  //   path: "/Register",
  //   component: () => import("@/views/RegisterAcc.vue"),
  // },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
