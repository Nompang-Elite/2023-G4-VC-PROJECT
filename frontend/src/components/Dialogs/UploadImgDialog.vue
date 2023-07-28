<template>
  <!--How to use v-rating:  https://codingbeautydev.com/blog/vuetify-rating/ -->
  <!-- Review dialog -->
  <v-dialog
    width="auto"
    v-model="Hotel.uploadDialog"
    close-delay="500"
    open-delay="500"
  >
    <v-card rounded="xl" width="30rem" theme="dark">
      <v-card-title class="pa-6 text-h5 font-weight-bold text-uppercase">
        Upload image
      </v-card-title>
      <v-card-text>
        <v-file-input
          show-size
          multiple
          rounded="xl"
          prepend-icon="mdi-camera"
          variant="outlined"
          label="Select your image"
          v-model="Hotel.imgFiles"
          :rules="Hotel.imgRules"
        ></v-file-input>
      </v-card-text>
      <v-card-actions class="mx-4 mb-4">
        <v-btn
          block
          variant="outlined"
          color="info"
          rounded="xl"
          @click.prevent="Hotel.uploadHotelImg()"
          >upload</v-btn
        >
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { useHotelStore } from "@/store/HotelStore";
import { ref } from "vue";
export default {
  setup() {
    const Hotel = ref(useHotelStore());
    return { Hotel };
  },
};
</script>
