<template>
  <v-container>
    <!-- //Button -->
    <v-btn
      class="mx-4 bg-info"
      rounded="pill"
      style="margin: 3%"
      @click="filterReviews('desc')"
      >HIGHEST
    </v-btn>
    <v-btn class="bg-red-darken-1" rounded="pill" @click="filterReviews('asc')"
      >LOWEST</v-btn
    >
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

    // const filteredReviews = ref
    return { Hotel, Guest, Auth };
  },
  //Function user_id rating
  beforeMount() {
    this.Guest.getHotelReviews(this.Auth.getUser().hotel_id);
  },

  methods: {
    //Function Filter rating review
    filterReviews(sortBy) {
      //Solution from:  https://stackoverflow.com/questions/1063007/how-to-sort-an-array-of-integers-correctly#1063027
      if (sortBy === "asc") {
        this.Guest.hotelReviews = this.Guest.hotelReviews.sort(
          (current, next) => current.rate - next.rate
        );
      } else if (sortBy === "desc") {
        this.Guest.hotelReviews = this.Guest.hotelReviews.sort(
          (current, next) => next.rate - current.rate
        );
      }
    },
  },
};
</script>
