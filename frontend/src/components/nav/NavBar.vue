<template>
  <!-- Navigation -->
  <v-app-bar
    extended
    style="padding-bottom: 0rem"
    elevation="2"
    extension-height="60"
  >
    <!-- App navigation drawer -->
    <!-- <v-app-bar-nav-icon @click="toggle = !toggle"></v-app-bar-nav-icon> -->

    <!-- Main app-bar -->
    <v-app-bar-title>
      <span>Book</span>
      <span class="font-weight-light">eeng</span>
    </v-app-bar-title>

    <!-- Using left spacer to push the left element-->
    <v-spacer></v-spacer>

    <!-- Search bar -->
    <!-- Source : https://vuetifyjs.com/en/components/text-fields/ -->
    <v-text-field
      style="margin-left: 200px"
      density="compact"
      variant="outlined"
      label="Search templates"
      append-inner-icon="mdi-magnify"
      single-line
      hide-details
      @click:append-inner="onClick"
      size="small"
    ></v-text-field>

    <!-- Using right spacer to push the right element-->
    <v-spacer></v-spacer>

    <div v-if="loggedIn">
      <!-- User options after login -->
      <v-row class="mx-4" nav>
        <v-col>
          <v-btn variant="elevated" color="info">
            <v-icon>mdi-cart</v-icon>
            <span>MyCart</span>
          </v-btn>
        </v-col>

        <v-col>
          <v-btn
            variant="elevated"
            color="red"
            prepend-icon="mdi-login"
            @click="logOut"
          >
            Logout
          </v-btn>
        </v-col>
      </v-row>
    </div>

    <!-- Action button for top nav login and register-->
    <div v-else>
      <v-row class="mx-4" nav>
        <v-col>
          <v-btn to="/register" variant="elevated">
            <v-icon>mdi-account-plus</v-icon>
            <span>Register</span>
          </v-btn>
        </v-col>
        <v-col>
          <v-btn variant="elevated">
            <v-tab to="/login">
              <v-icon>mdi-login</v-icon>
              <span>Login</span>
            </v-tab>
          </v-btn>
        </v-col>
      </v-row>
    </div>
    <!-- Extended app-bar with slot -->

    <template #extension>
      <v-row justify="center" style="margin-buttom: 0rem">
        <v-tabs>
          <v-tab to="/">
            <v-icon size="large">mdi-home</v-icon>
            <span>Home</span>
          </v-tab>
          <v-tab to="/hotel">
            <v-icon size="large">mdi-home-city</v-icon>
            <span>Hotel</span>
          </v-tab>
          <v-tab to="/near_me">
            <v-icon size="large">mdi-map-marker</v-icon>
            <span>Near me</span>
          </v-tab>
          <v-tab to="/contact">
            <v-icon size="large">mdi-contacts</v-icon>
            <span>Contact</span>
          </v-tab>
        </v-tabs>
      </v-row>
    </template>
  </v-app-bar>
</template>

<script>
import { useUserStore } from "@/store/UserStore";
import { toRefs } from "vue";
export default {
  name: "NavBar",
  data() {
    return {
      toggle: false,
    };
  },

  setup() {
    const user = useUserStore();
    return toRefs(user);
  },
};
</script>

<style>
/* Costum icon margin */
.v-icon {
  margin: 0.4rem;
}
</style>
