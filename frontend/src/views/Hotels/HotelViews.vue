<template>
  <v-app>
    <MainViews>
      <!-- Nav Slot  -->
      <template #nav>
        <HotelNav />
      </template>
      <!-- Toolbar Slot  -->
      <template #toolbar>
        <HotelToolbar />
      </template>
      <!-- Footer Slot  -->
      <template #footer> </template>
    </MainViews>
  </v-app>
</template>
<script>
// Main views template
import MainViews from "../Main/MainViews.vue";
// Admin navbar
import HotelNav from "@/components/Navigations/HotelNav.vue";
// Admin Toolbar
import HotelToolbar from "@/components/Navigations/HotelToolbar.vue";
// Authentication Store
import { useAuthStore } from "@/store/AuthStore";
// Reactive package from vue
import { reactive } from "vue";
export default {
  // Composition setup
  setup() {
    let Auth = reactive(useAuthStore());
    return { Auth };
  },
  // Components
  components: { MainViews, HotelNav, HotelToolbar },
  // Methods
  methods: {},
};
</script>
