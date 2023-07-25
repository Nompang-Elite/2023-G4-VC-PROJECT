import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes";

// More

/**
 *
 * For more details about nested routes, check the official link below:
 * https://router.vuejs.org/guide/essentials/nested-routes.html
 *
 * */

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Route Gaurd solution :https://medium.com/js-dojo/how-to-implement-route-guard-in-vue-js-9929c93a13db

router.beforeEach((to, from, next) => {
  const uAdmin = JSON.parse(sessionStorage.getItem("admin_logged"));
  const uOwner = JSON.parse(sessionStorage.getItem("owner_logged"));
  // Admin route gaurd:
  console.log(uOwner, to.meta.isOwner);
  if (uOwner && to.meta.isOwner) {
    next();
  } else if (uAdmin && to.meta.isAdmin) {
    next();
  } else if (!uOwner && !uAdmin && to.meta.isGuest) {
    next();
  }
});

export default router;
