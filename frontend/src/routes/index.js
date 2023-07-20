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
  // Admin route gaurd:
  const userInfo = JSON.parse(sessionStorage.getItem("user_data"));
  if (!(userInfo !== "null")) {
    console.log(userInfo !== "null");
    if (
      userInfo["user_type"] === "admin" &&
      !to.meta.isAdmin &&
      !to.meta.isGuest
    ) {
      next();
    } else if (
      userInfo["user_type"] === "hotel_owner" &&
      !to.meta.isAdmin &&
      !to.meta.isOwner &&
      !to.meta.isGuest
    ) {
      next();
    }
  } else if (to.meta.isGuest) {
    next();
  }
});

export default router;
