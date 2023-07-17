<template>
  <v-carousel height="400" hide-delimiters cycle interval="3500">
    <!-- Carousel Item -->
    <v-carousel-item v-for="(hotel, i) in slides" :key="i">
      <v-sheet>
        <v-img
          transition
          aspect-ratio="16/9"
          cover
          src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
        >
        </v-img>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>
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
</template>
<script>
export default {
  // Take list of slide objs, which could be the hotel obj
  props: ["slides"],
};
</script>
