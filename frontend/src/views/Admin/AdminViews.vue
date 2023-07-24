<template>
  <v-app>
    <MainViews>
      <!-- Nav Slot  -->
      <template #nav>
        <AdminNav />
      </template>
      <!-- Toolbar Slot  -->
      <template #toolbar>
        <AdminToolbar />
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
import AdminNav from "@/components/Navigations/AdminNav.vue";
// Admin Toolbar
import AdminToolbar from "@/components/Navigations/AdminToolbar.vue";
// Authentication Store
import { useAuthStore } from "@/store/AuthStore";
// Guest Store
import { useGuestStore } from "@/store/GuestStore";
// Reactive package from vue
import { reactive } from "vue";
export default {
  // Composition setup
  setup() {
    let Auth = reactive(useAuthStore());
    let Guest = reactive(useGuestStore());
    return { Auth, Guest };
  },
  // Components
  components: { MainViews, AdminNav, AdminToolbar },
  // Methods
  methods: {
    searchHotel(e) {
      this.Guest.getSearchData(e);
      if (e !== null && String(e).length >= 1) {
        if (this.Guest.results.length >= 1) {
          this.$router.push("/search");
        } else {
          this.$router.push("/search/not_found");
        }
      } else {
        this.$router.push("/search/not_found");
      }
    },
  },
};
</script>
