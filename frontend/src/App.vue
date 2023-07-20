<template>
  <v-app>
    <AdminLoginDialog v-if="Auth.adminLog" />
    <GuestsViews v-if="Auth.guestView" />
    <HotelViews v-if="Auth.hotelView" />
    <AdminViews v-if="Auth.adminView" />
  </v-app>
</template>

<script>
import GuestsViews from "./views/Guests/GuestsViews.vue";
import HotelViews from "./views/Hotels/HotelViews.vue";
import AdminViews from "./views/Admin/AdminViews.vue";
import AdminLoginDialog from "./components/Dialogs/AdminLoginDialog.vue";
import { useAuthStore } from "./store/AuthStore";
import { reactive } from "vue";
export default {
  created() {
    if (JSON.parse(sessionStorage.getItem("adminSecret"))) {
      this.Auth.adminLog = true;
    } else if (JSON.parse(sessionStorage.getItem("admin_logged"))) {
      sessionStorage.removeItem("user_logged");
      this.Auth.adminView = true;
      this.Auth.guestView = !this.Auth.adminView;
    } else if (JSON.parse(sessionStorage.getItem("owner_logged"))) {
      this.Auth.hotelView = true;
      this.Auth.guestView = !this.Auth.hotelView;
    } else if (
      !JSON.parse(sessionStorage.getItem("user_logged")) &&
      !JSON.parse(sessionStorage.getItem("owner_logged"))
    ) {
      this.Auth.clearUserData();
    }
  },
  setup() {
    const Auth = reactive(useAuthStore());
    return {
      Auth,
    };
  },
  components: { GuestsViews, HotelViews, AdminViews, AdminLoginDialog },
};
</script>

<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
/* Scroll bar style from: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_custom_scrollbar */
</style>
