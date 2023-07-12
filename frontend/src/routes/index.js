import { createRouter, createWebHistory } from "vue-router";

const routes = [
  // {
  //   path: "",
  //   name: "",
  //   component: () => import(""),
  // },

  {
    path: "/",
    name: "Home",
    component: () => import("@/views/HomeView.vue"),
  },
  {
    path: "/hotels",
    name: "Hotels",
    component: () => import("@/views/HotelsView.vue"),
  },
  {
    path: "/near_me",
    name: "NearMe",
    component: () => import("@/views/HomeView.vue"),
  },
  {
    path: "/abouts",
    name: "Abouts",
    component: () => import("@/views/HomeView.vue"),
  },
  //Solution Redirection: https://stackoverflow.com/questions/50961082/vue-js-how-to-redirect-to-a-common-route-if-route-isnt-found
  {
    // Vue 3 need to use /:pathMatch(.*)*
    path: "/:pathMatch(.*)*",
    name: "Not Found",
    component: () => import("@/components/Errors/NotFound.vue"),
  },
];

export default createRouter({
  history: createWebHistory(),
  routes,
});
