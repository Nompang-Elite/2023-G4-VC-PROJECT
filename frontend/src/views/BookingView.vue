<template>
    <v-dialog v-model="dialog">
      <template v-slot:activator="{ props }">
        <v-btn color="primary" v-bind="props"> Show Dtail </v-btn>
      </template>
      <v-sheet width="800" class="mx-auto pa-10 spacing-playground rounded-xl">
        <v-card flat>
          <v-card-text>
            <v-row class="mb-2">
              <v-col cols="3">
                <v-img
                  src="https://picsum.photos/300/300"
                  class="rounded-xl"
                ></v-img>
              </v-col>
              <v-col cols="9">
                <v-card-title> Cards title </v-card-title>
                <v-card-subtitle> Description </v-card-subtitle>
              </v-col>
            </v-row>
  
            <v-sheet elevation="4" rounded="xl">
              <v-carousel
                hide-delimiters
                show-arrows="hover"
                height="260"
                class="rounded-xl"
                interval="3000"
              >
                <v-carousel-item
                  v-for="(roomImg, i) in roomImgs"
                  :key="i"
                  cover
                  :src="roomImg.img"
                >
                </v-carousel-item>
              </v-carousel>
            </v-sheet>
  
            <v-row class="mt-3">
              <v-col cols="3">
                <VueDatePicker
                  v-model="checkInDate"
                  placeholder="Check In"
                ></VueDatePicker>
              </v-col>
              <v-col cols="3">
                <VueDatePicker
                  v-model="checkOutDate"
                  placeholder="Check Out"
                ></VueDatePicker>
              </v-col>
                <v-spacer></v-spacer>
              <v-card-actions>
                <v-btn variant="elevated" width="100" rounded="pill" color="info">Book</v-btn>
              </v-card-actions>
            </v-row>
          </v-card-text>
        </v-card>
      </v-sheet>
    </v-dialog>
  </template>
  <script>
  import VueDatePicker from "@vuepic/vue-datepicker";
  export default {
    components: { VueDatePicker },
    data() {
      return {
        checkInDate: null,
        checkOutDate: null,
        dialog: false,
        roomImgs: [
          {
            img: "https://picsum.photos/600/300",
            count: 1,
          },
          {
            img: "https://picsum.photos/600/300",
            count: 2,
          },
          {
            img: "https://picsum.photos/600/300",
            count: 3,
          },
        ],
      };
    },
  };
  </script>
  