<template>
  <v-container>
    <v-sheet class="py-4 text-uppercase">
      <h3>Reviews</h3>
    </v-sheet>
    <v-row v-if="Guest.isLoggedIn()">
      <v-col>
        <v-btn
          rounded="xl"
          color="info"
          @click.prevent="
            Guest.review.reviewDialog = !Guest.review.reviewDialog
          "
        >
          Post reviews
        </v-btn>
      </v-col>
    </v-row>

    <v-row v-for="review in Guest.hotelReviews" :key="review">
      <v-col>
        <v-hover v-slot="{ isHovering, props }">
          <v-card
            rounded="xl"
            :elevation="isHovering ? 12 : 2"
            :class="{ 'on-hover': isHovering }"
            v-bind="props"
          >
            <v-card-text>
              <v-row align="center">
                <v-col cols="2">
                  <v-card-title>
                    {{ review.user.firstname + " " + review.user.lastname }}
                  </v-card-title>
                </v-col>
                <v-col cols="10">
                  <v-card-subtitle class="text-right">
                    <v-rating
                      color="yellow"
                      size="20"
                      v-model="review.rate"
                      disabled
                    ></v-rating>
                  </v-card-subtitle>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" class="px-7">
                  {{ review.comment }}
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
        </v-hover>
      </v-col>
    </v-row>
  </v-container>
  <PostReviewDialog :hotel-id="this.$route.params.id" />
</template>
<script>
import PostReviewDialog from "../Dialogs/PostReviewDialog.vue";
import { useGuestStore } from "@/store/GuestStore";
import { ref } from "vue";
export default {
  setup() {
    const Guest = ref(useGuestStore());
    return { Guest };
  },
  components: { PostReviewDialog },
  beforeMount() {
    this.Guest.getHotelReviews(this.$route.params.id);
  },
};
</script>
