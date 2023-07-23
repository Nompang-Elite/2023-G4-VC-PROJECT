<template>
  <v-container>
    <v-row>
      <!-- Left side -->
      <v-col cols="8">
        <v-card rounded="xl" class="pa-4">
          <v-card-text>
            <v-row>
              <v-col cols="6">
                <v-img
                  height="300"
                  width="600"
                  cover
                  :src="Hotel.imgDecoder + Hotel.hotelImg"
                ></v-img>
              </v-col>
              <v-col cols="6">
                <v-card-title> {{ Hotel.hotelInfo.name }}</v-card-title>
                <v-card-subtitle>
                  <v-rating size="20" v-model="Hotel.hotelInfo.rate"></v-rating>
                </v-card-subtitle>
                <span>
                  {{ Hotel.hotelInfo.description }}
                </span>
              </v-col>
            </v-row>
          </v-card-text>
          <v-card-actions>
            <v-btn
              rounded="xl"
              variant="elevated"
              color="info"
              @click.prevent="Hotel.uploadDialog = !Hotel.uploadDialog"
              >Upload image</v-btn
            >
          </v-card-actions>
        </v-card>
        <v-card class="my-4" rounded="xl">
          <v-card-text>
            <CarouselCover rounded="xl" :slides="Hotel.hotelImgs" />
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
  components: { CarouselCover, UploadDialog },
  beforeMount() {
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
