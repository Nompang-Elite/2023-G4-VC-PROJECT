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
