<template>
  <v-app-bar nav color="#1D3557" class="text-white">
    <v-app-bar-title>
      <span class="text-h6">Admin | Book</span>
      <span class="font-weight-light text-h6">eeng</span>
    </v-app-bar-title>
    <v-spacer></v-spacer>
    <v-btn variant="outlined" rounded="xl" @click="Auth.logout()">Logout</v-btn>
  </v-app-bar>
</template>

<script>
import { useAuthStore } from "@/store/AuthStore";
import { reactive } from "vue";
export default {
  components: {},
  setup() {
    const Auth = reactive(useAuthStore());
    return { Auth };
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
