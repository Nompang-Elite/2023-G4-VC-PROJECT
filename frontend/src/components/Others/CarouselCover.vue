<template>
  <v-carousel height="400" hide-delimiters cycle interval="3500">
    <!-- Carousel Item -->
    <v-carousel-item v-for="(hotel, i) in slides" :key="i">
      <v-sheet>
        <v-img
          aspect-ratio="16/9"
          cover
          src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
        >
        </v-img>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>
</template>
<script>
export default {
  // Take list of slide objs, which could be the hotel obj
  props: ["slides"],
};
</script>
