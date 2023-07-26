<template>
  <v-container>
    <!-- //Button -->
    <v-btn class="mx-4 bg-info" rounded="pill" style="margin: 3%"
      >HIGHGEST
    </v-btn>
    <v-btn class="bg-red-darken-1" rounded="pill">LOWEST</v-btn>
    <v-table>
      <thead class="bg-info">
        <tr>
          <th class="text-white">USER</th>
          <th class="text-white">COMMENT</th>
          <th class="text-white">RATING</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="review in Guest.hotelReviews" :key="review">
          <td>{{ review.user.firstname + " " + review.user.lastname }}</td>
          <td>{{ review.comment }}</td>
          <td>
            {{ review.rate }}
            <v-rating
              disabled
              color="yellow"
              size="20"
              v-model="review.rate"
            ></v-rating>
          </td>
        </tr>
      </tbody>
    </v-table>
  </v-container>
</template>

<script>
import { useHotelStore } from "@/store/HotelStore.js";
import { useGuestStore } from "@/store/GuestStore.js";
import { useAuthStore } from "@/store/AuthStore.js";
import { ref } from "vue";
export default {
  setup() {
    const Hotel = ref(useHotelStore());
    const Guest = ref(useGuestStore());
    const Auth = ref(useAuthStore());
    return { Hotel, Guest, Auth };
  },
  //Function user_id rating
  beforeMount() {
    this.Guest.getHotelReviews(this.Auth.getUser().hotel_id);
  },
};
</script>
