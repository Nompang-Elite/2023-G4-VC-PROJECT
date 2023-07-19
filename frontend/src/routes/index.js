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



export default router;
