<template>
  <v-container>
    <v-row>
      <!-- Left side -->
      <v-col cols="8">
        <v-card rounded="xl" class="pa-4" color="#F0FAFF">
          <v-card-text>
            <v-row>
              <v-col cols="6">
                <v-img
                  height="100%"
                  cover
                  class="rounded-lg"
                  :src="Hotel.imgDecoder + Hotel.hotelImg"
                ></v-img>
              </v-col>
              <v-col cols="6">
                <v-card-title> {{ Hotel.hotelInfo.name }}</v-card-title>
                <v-card-subtitle>
                  <v-rating
                    disabled
                    color="#E63946"
                    size="20"
                    v-model="Hotel.hotelInfo.rate"
                  ></v-rating>
                </v-card-subtitle>
                <v-sheet class="ma-4 text-justify" color="#F0FAFF">
                  {{ Hotel.hotelInfo.description }}
                </v-sheet>
              </v-col>
            </v-row>
          </v-card-text>
          <v-card-actions>
            <v-btn
              rounded="xl"
              variant="elevated"
              color="info"
              class="px-4"
              @click.prevent="Hotel.uploadDialog = !Hotel.uploadDialog"
              >Upload image</v-btn
            >
          </v-card-actions>
        </v-card>
        <v-card color="#F0FAFF" class="my-4" rounded="xl">
          <v-card-title class="px-4 mt-4"> Hotel images </v-card-title>
          <v-card-subtitle>{{ Hotel.hotelInfo.name }}</v-card-subtitle>
          <v-card-text>
            <v-sheet rounded="xl">
              <CarouselCover class="rounded-lg" :slides="Hotel.hotelImgs" />
            </v-sheet>
          </v-card-text>
        </v-card>
      </v-col>
      <!-- Right side -->
      <v-col cols="4"> </v-col>
    </v-row>
    <UploadDialog />
  </v-container>
</template>
<script>
import { useHotelStore } from "@/store/HotelStore";
import { useAuthStore } from "@/store/AuthStore";
import CarouselCover from "@/components/Others/CarouselCover.vue";
import UploadDialog from "@/components/Dialogs/UploadImgDialog.vue";
import { ref } from "vue";
export default {
  title: "Hotel Home",
  components: { CarouselCover, UploadDialog },
  beforeCreate() {
    this.Hotel.hotelId = this.Auth.getUser()["hotel_id"];
    this.Hotel.getHotelInfo();
    this.Hotel.getHotelImage();
  },
  setup() {
    const Auth = ref(useAuthStore());
    const Hotel = ref(useHotelStore());
    return { Hotel, Auth };
  },
};
</script>
