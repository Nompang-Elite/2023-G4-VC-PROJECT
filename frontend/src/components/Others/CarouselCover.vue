<template>
  <v-carousel height="400" hide-delimiters cycle interval="3500">
    <!-- Carousel Item -->
    <v-carousel-item v-for="(hotel, i) in slides" :key="i">
      <!-- Sheet to contain card -->
      <v-sheet class="pa-4">
        <!-- Card -->
        <v-card rounded="xl" elevation="4">
          <v-row>
            <v-col>
              <!-- Card image -->
              <v-img
                aspect-ratio="16/9"
                cover
                src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
              ></v-img>
            </v-col>
            <v-col>
              <v-card-title>{{ hotel.name }}</v-card-title>
              <v-card-subtitle>{{ hotel.location }} </v-card-subtitle>
              <v-card-text>
                {{ hotel.description }}
              </v-card-text>

              <v-card-action class="ma-4">
                <v-btn color="info" rounded="xl"> Details </v-btn>
              </v-card-action>
            </v-col>
          </v-row>
        </v-card>
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
