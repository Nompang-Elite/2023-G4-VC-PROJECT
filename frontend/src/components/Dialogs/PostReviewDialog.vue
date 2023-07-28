<template>
  <!--How to use v-rating:  https://codingbeautydev.com/blog/vuetify-rating/ -->
  <!-- Review dialog -->
  <v-dialog
    width="auto"
    v-model="Guest.review.reviewDialog"
    close-delay="500"
    open-delay="500"
  >
    <v-card rounded="xl" width="30rem" theme="dark">
      <v-card-title class="pa-6 text-h5 font-weight-bold text-uppercase">
        Post reviews
      </v-card-title>
      <v-card-subtitle>
        <!-- Rate -->
        <v-rating v-model="Guest.review.reviewsInfo.rate"></v-rating>
      </v-card-subtitle>
      <v-card-text>
        <v-form v-model="Guest.review.isValidReview">
          <!-- Comment -->
          <v-textarea
            clearable
            no-resize
            label="What is your thought?"
            rounded="lg"
            variant="outlined"
            :rules="[
              (v) =>
                String(v).length > 10 ||
                'Text field must container at least more than 10 character.',
            ]"
            v-model="Guest.review.reviewsInfo.comment"
          ></v-textarea>
        </v-form>
      </v-card-text>
      <v-card-actions class="mx-4 mb-4">
        <v-btn
          block
          variant="outlined"
          rounded="xl"
          color="info"
          :disabled="!Guest.review.isValidReview"
          @click.prevent="Guest.postReview(hotelId)"
          :loading="Guest.loading"
          >submit</v-btn
        >
      </v-card-actions>
    </v-card>
  </v-dialog>
  <!--Success message dialog -->
  <v-dialog width="auto" v-model="Guest.review.isPosted">
    <v-alert type="success" title="Success"></v-alert>
  </v-dialog>
  <!-- Fails message dialog -->
  <v-dialog width="auto" v-model="Guest.review.isNotPosted">
    <v-alert type="warning" title="Something went wrong"></v-alert>
  </v-dialog>
</template>

<script>
import { useGuestStore } from "@/store/GuestStore";
import { ref } from "vue";
export default {
  props: ["hotel-id"],
  setup() {
    const Guest = ref(useGuestStore());
    return { Guest };
  },
};
</script>
