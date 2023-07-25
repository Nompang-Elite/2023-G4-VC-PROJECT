<template>
  <!-- ===================Contain-card==================== -->
  <v-container v-if="hotels !== null">

    <v-btn to="/" class="ma-4" color="blue darken-2" dark>
      <v-icon size="large">mdi-chevron-double-left</v-icon>
      Back
    </v-btn>

    <!-- ======Card hotel======== -->
    <v-card rounded="xl" class="pa-4">
      <v-card-title>
        <v-row>
          <v-col cols="4">
            <v-img :src="'data:image/*;base64,' + hotelImgs[0].image_hash">

            </v-img>
          </v-col>
          <v-col cols="8">
            <v-card-title >
            <h3>{{ hotels.name }}</h3>  
            </v-card-title>
            <v-card-subtitle>
              <v-rating size="20" disabled color="yellow" v-model="hotels.rate"></v-rating>
            </v-card-subtitle>
            <v-sheet class="text-wrap pa-2 text-justify font-weight-light" v-for="(item, i) in  hotels.info " :key="i">
              <span>
              Address:  {{ item.address }}, {{ item.city }}, {{ item.country }}
              </span>

            </v-sheet>
            <v-sheet class="text-wrap pa-2 text-justify font-weight-light">
              <span>
                {{ hotels.description }}
              </span>

            </v-sheet>
            
          </v-col>
        </v-row>
      </v-card-title>
    </v-card>
    <!-- ============slind Image hotel======================== 
      -->
    <v-sheet elevation="2" max-width="1300" class="mx-auto rounded-xl">
      <v-carousel hide-delimiters show-arrows="hover" height="300" class="rounded-xl">
        <v-carousel-item v-for="(img, i) in hotelImgs" :key="i" cover :src="'data:image/*;base64,' + img.image_hash">
        </v-carousel-item>
      </v-carousel>
    </v-sheet>
    <CardRoom :hotel="hotels" />
  </v-container>
  <!-- ============Card Room======================== -->
</template>

<script>
//=========Card hotel==== //
import CardRoom from "@/components/Cards/RoomCard.vue";
import api from "@/routes/api";


export default {
  components: { CardRoom },
  data() {
    return {
      hotels: null,
      hotelImgs: [],
    };
  },

  beforeMount() {
    api.api_base
      .get(`/hotel/info/${this.$route.params.id}`)
      .then((response) => {
        console.log(response.data.data)
        this.hotels = response.data.data;
        this.hotelImgs = response.data.data.images;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
