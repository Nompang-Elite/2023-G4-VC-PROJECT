<template>
  <v-container>
    <v-card rounded="lg" class="pa-4">
      <v-card-text>
        <v-row>
          <v-col cols="6">
            <v-img></v-img>
          </v-col>
          <v-col cols="6">
            <v-card-title> Hotel name</v-card-title>
            <v-card-subtitle>
              Lorem ipsum dolor sit amet consectetur.
            </v-card-subtitle>
          </v-col>
          <span>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod itaque
            laborum consectetur, harum explicabo ex voluptas cumque nulla sit
            cupiditate placeat atque non vitae eum architecto dolore impedit!
            Blanditiis, tenetur!
          </span>
        </v-row>
      </v-card-text>
    </v-card>
  </v-container>
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
