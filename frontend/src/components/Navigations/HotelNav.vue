<template>
  <v-app-bar nav>
    <v-app-bar-title>
      <span class="text-h6">Dashboard | Book</span>
      <span class="font-weight-light text-h6">eeng</span>
    </v-app-bar-title>
    <v-spacer></v-spacer>
    <!-- <v-btn variant="elevated" rounded="xl" @click="Auth.logout()">Logout</v-btn> -->
    <v-menu>
      <template v-slot:activator="{ props }">
        <v-btn
          class="mr-2"
          size="38"
          variant="flat"
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
