<template>
  <MainViews>
    <template #nav>
      <NavBar @search-input="searchHotel" />
    </template>
    <template #footer>
      <LoginDialog />
      <RegisterDialog />
      <FooterNav />
    </template>
  </MainViews>
</template>
<script>
// Main views template
import MainViews from "../Main/MainViews.vue";
// Nav bar template
import NavBar from "@/components/Navigations/NavBar.vue";
// Footer template
import FooterNav from "@/components/Navigations/FooterNav.vue";
// Login dialog
import LoginDialog from "@/components/Dialogs/LoginDialog.vue";
// Register dialog
import RegisterDialog from "@/components/Dialogs/RegisterDialog.vue";
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
  components: { MainViews, NavBar, FooterNav, LoginDialog, RegisterDialog},
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
