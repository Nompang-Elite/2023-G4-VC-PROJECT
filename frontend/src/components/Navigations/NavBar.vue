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
      density="compact"
      variant="solo"
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
    <div>
      <v-btn
        text="Login"
        variant="elevated"
        color="info"
        prepend-icon="mdi-account-circle-outline"
        class="mr-2"
        rounded="xl"
        @click.prevent="loginDialog = !loginDialog"
      >
      </v-btn>
      <v-btn
        text="Register"
        variant="elevated"
        color="info"
        prepend-icon="mdi-account-plus"
        class="mr-6"
        rounded="xl"
        @click.prevent="registerDialog = !registerDialog"
      >
      </v-btn>
    </div>
    <div>
      <v-btn
        text="Logout"
        variant="elevated"
        color="info"
        prepend-icon="mdi-logout"
        class="mr-6"
        rounded="xl"
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
    searchInput: null,
  }),

  methods: {
    passSearchInput() {
      this.$emit("search-input", this.searchInput);
    },
  },
};
</script>
