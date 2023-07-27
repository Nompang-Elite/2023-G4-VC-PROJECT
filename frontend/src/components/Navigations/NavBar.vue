<template>
  <v-app-bar
    extended
    nav
    extension-height="40"
    color="#1D3557"
    class="nav-text"
  >
    <!-- Nav menu icons -->
    <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
    <!-- Nav title -->
    <v-app-bar-title>
      <span class="text-h5">Book</span>
      <span class="font-weight-light text-h5">eeng</span>
    </v-app-bar-title>
    <v-spacer></v-spacer>
    <!-- Search bar -->
    <!-- Source: https://vuetifyjs.com/en/components/text-fields/ -->
    <v-text-field
      density="compact"
      variant="outlined"
      label="Search"
      append-inner-icon="mdi-magnify"
      single-line
      hide-details
      rounded="xl"
      v-model="searchInput"
      @keydown.enter="passSearchInput"
    ></v-text-field>

    <v-spacer></v-spacer>
    <!-- Buttons Options -->
    <div v-if="Auth.userLogged()">
      <v-btn
        variant="outlined"
        color="info"
        prepend-icon="mdi-history"
        class="mr-2"
        rounded="xl"
        text="History"
      >
      </v-btn>
      <v-btn
        variant="outlined"
        color="info"
        prepend-icon="mdi-cart"
        class="mr-2"
        rounded="xl"
        text="Booking"
      >
      </v-btn>
      <v-menu>
        <template v-slot:activator="{ props }">
          <v-btn
            class="mr-2"
            color="info"
            size="38"
            variant="outlined"
            v-bind="props"
            icon="mdi-menu"
          >
          </v-btn>
        </template>
        <v-list>
          <v-list-item to="" prepend-icon="mdi-cog" title="Setting">
          </v-list-item>
          <v-list-item
            @click.prevent="Auth.logout()"
            prepend-icon="mdi-logout"
            title="Logout"
          >
          </v-list-item>
        </v-list>
      </v-menu>
    </div>
    <div v-else>
      <v-btn
        text="Login"
        variant="outlined"
        prepend-icon="mdi-account-circle-outline"
        class="mr-2"
        rounded="xl"
        @click.prevent="Auth.loginDialog = !Auth.loginDialog"
      >
      </v-btn>
      <v-btn
        text="Register"
        variant="outlined"
        prepend-icon="mdi-account-plus"
        class="mr-6"
        rounded="xl"
        @click.prevent="Auth.registerDialog = !Auth.registerDialog"
      >
      </v-btn>
    </div>
    <!-- Add more options here! with v-if checkUserData().role -->

    <!-- Toolbar for cutomers -->
    <template #extension>
      <v-spacer></v-spacer>
      <v-tabs centered>
        <v-tab prepend-icon="mdi-home" to="/">Home</v-tab>
        <v-tab prepend-icon="mdi-home-city" to="/hotels">Hotels</v-tab>
        <v-tab prepend-icon="mdi-map-marker" to="/near_me">Near Me</v-tab>
        <v-tab prepend-icon="mdi-information" to="/abouts">Abouts</v-tab>
      </v-tabs>
      <v-spacer></v-spacer>
    </template>
  </v-app-bar>
</template>

<script>
import { useAuthStore } from "@/store/AuthStore";
import { reactive } from "vue";
export default {
  setup() {
    const Auth = reactive(useAuthStore());
    return { Auth };
  },
  // Search bar loading
  data: () => ({
    searchInput: "",
  }),

  methods: {
    passSearchInput() {
      this.$emit("search-input", this.searchInput);
    },
  },
};
</script>
<style scoped>
.nav-text {
  color: #f1faee !important;
}
</style>
