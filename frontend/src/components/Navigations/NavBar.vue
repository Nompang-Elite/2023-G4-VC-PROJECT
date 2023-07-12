<template>
  <v-app-bar extended nav flat extension-height="40">
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
      :loading="loading"
      density="compact"
      variant="solo"
      label="Search"
      append-inner-icon="mdi-magnify"
      single-line
      hide-details
      @click:append-inner="onClick"
      rounded="xl"
    ></v-text-field>

    <v-spacer></v-spacer>
    <!-- Buttons Options -->
    <div v-if="!checkUser()">
      <v-btn
        text="Sign In"
        variant="elevated"
        color="info"
        prepend-icon="mdi-account-circle-outline"
        class="mr-2"
        rounded="xl"
        @click.prevent="login = !login"
      >
      </v-btn>
      <v-btn
        text="Sign Up"
        variant="elevated"
        color="info"
        prepend-icon="mdi-account-plus"
        class="mr-6"
        rounded="xl"
        @click.prevent="test"
      >
      </v-btn>
    </div>
    <div v-else>
      <v-btn
        text="Logout"
        variant="elevated"
        color="info"
        prepend-icon="mdi-logout"
        class="mr-6"
        rounded="xl"
        @click.prevent="logout"
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
import { toRefs } from "vue";
export default {
  setup() {
    const Auth = useAuthStore();
    return toRefs(Auth);
  },
  // Search bar loading
  data: () => ({
    loaded: false,
    loading: false,
  }),

  methods: {
    onClick() {
      this.loading = true;

      setTimeout(() => {
        this.loading = false;
        this.loaded = true;
      }, 2000);
    },

    test() {
      console.log((this.register = !this.register));
    },
  },
};
</script>
