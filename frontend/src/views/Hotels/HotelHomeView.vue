<template>
  <v-container>
    <v-row>
      <!-- Left side -->
      <v-col cols="8">
        <v-card rounded="lg" class="pa-4">
          <v-card-text>
            <v-row>
              <v-col cols="6">
                <v-img></v-img>
              </v-col>
              <v-col cols="6">
                <v-card-title> {{ Hotel.hotelInfo.name }}</v-card-title>
                <v-card-subtitle>
                  <v-rating size="20" v-model="Hotel.hotelInfo.rate"></v-rating>
                </v-card-subtitle>
              </v-col>
              <span>
                {{ Hotel.hotelInfo.description }}
              </span>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>
      <!-- Right side -->
      <v-col cols="4"> </v-col>
    </v-row>
  </v-container>
</template>
<script>
import { useHotelStore } from "@/store/HotelStore";
import { useAuthStore } from "@/store/AuthStore";
import { ref } from "vue";
export default {
  beforeMount() {
    this.Hotel.hotelId = this.Auth.getUser()["hotel_id"];
    this.Hotel.getHotelInfo();
  },
  setup() {
    const Auth = ref(useAuthStore());
    const Hotel = ref(useHotelStore());
    return { Hotel, Auth };
  },
};
</script>
