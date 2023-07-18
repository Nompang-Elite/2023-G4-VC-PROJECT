import { createRouter, createWebHistory } from "vue-router";

const routes = [
  /**
   * This is the template, just copy and past in the value
   */

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
    /**
     * Route to the hotel views
     * */
    path: "/hotels",
    name: "Hotels",
    component: () => import("@/views/HotelsView.vue"),
  },
  {
    /**
     * Route to the near me views
     * */
    path: "/near_me",
    name: "NearMe",
    component: () => import("@/views/NearMe.vue"),
  },
  {
    /**
     * Route to the abouts views
     * */
    path: "/abouts",
    name: "Abouts",
    component: () => import("@/views/HomeView.vue"),
  },
  {
    //Solution Redirection: https://stackoverflow.com/questions/50961082/vue-js-how-to-redirect-to-a-common-route-if-route-isnt-found
    // Vue 3 need to use /:pathMatch(.*)*
    path: "/:pathMatch(.*)*",
    name: "Not Found",
    component: () => import("@/components/Errors/NotFound.vue"),
  },
  {
    path: "/search",
    name: "Search",
    children: [
      {
        /**
         * This will render the parent route
         * **/
        path: "",
        name: "Result",
        component: () => import("@/views/SearchView.vue"),
      },
      {
        /**
         * This will be rendered when the search result is not found
         * */
        path: "not_found",
        name: "Not Found",
        component: () => import("@/components/Errors/NotFound.vue"),
      },
    ],
  },
  {
    path: '/register_hotel',
    name: 'Register Hotel',
    component: () => import('@/components/Dialogs/RegisterHotelDialog.vue'),
  }
  // More route goes here!!!
];

// More

/**
 *
 * For more details about nested routes, check the official link below:
 * https://router.vuejs.org/guide/essentials/nested-routes.html
 *
 * */

export default createRouter({
  history: createWebHistory(),
  routes,
});
