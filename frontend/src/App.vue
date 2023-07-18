<template>
  <v-app>
    <GuestsViews v-if="guestView" />
    <HotelViews v-if="hotelView" />
    <AdminViews v-if="adminView" />
  </v-app>
</template>

<script>
import GuestsViews from "./views/Guests/GuestsViews.vue";
import HotelViews from "./views/Hotels/HotelViews.vue";
import AdminViews from "./views/Admin/AdminViews.vue";
export default {
  data() {
    return {
      guestView: true,
      hotelView: false,
      adminView: false,
    };
  },
  components: { GuestsViews, HotelViews, AdminViews },
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
