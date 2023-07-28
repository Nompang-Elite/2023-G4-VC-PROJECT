<template>
  <!-- ===================Contain-card==================== -->
  <v-container v-if="hotels !== null">
    <v-btn rounded="xl" variant="elevated" to="/" color="info" class="ma-4">
      <v-icon size="large">mdi-chevron-double-left</v-icon>
      Back
    </v-btn>

    <!-- ======Card hotel======== -->
    <v-card rounded="xl" class="pa-2 mb-8" elevation="4" color="#F0FAFF">
      <v-card-title>
        <v-row>
          <v-col cols="4">
            <v-img
              class="rounded-lg"
              cover
              height="100%"
              :src="
                'data:image/*;base64,' +
                (hotelImgs.length > 0 ? hotelImgs[0].image_hash : null)
              "
            >
            </v-img>
          </v-col>
          <v-col cols="8" class="pr-8">
            <v-card-title class="text-h4 mb-4">
              {{ hotels.name }}
            </v-card-title>
            <v-rating
              size="30"
              disabled
              color="#E63946"
              v-model="hotels.rate"
              class="px-4"
            ></v-rating>
            <v-sheet
              class="text-wrap pa-4 text-justify font-weight-light"
              v-for="(item, i) in hotels.info"
              :key="i"
              color="#F0FAFF"
            >
              <span class="text-grey text-capitalize">
                Address: {{ item.address }}, {{ item.city }}, {{ item.country }}
              </span>
            </v-sheet>
            <v-sheet
              class="text-wrap pa-4 pb-8 text-justify font-weight-light"
              color="#F0FAFF"
            >
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
    <v-sheet elevation="4" max-width="auto" class="mx-auto my-4 rounded-xl">
      <v-carousel
        hide-delimiters
        show-arrows="hover"
        height="300"
        class="rounded-xl"
      >
        <v-carousel-item
          v-for="(img, i) in hotelImgs"
          :key="i"
          cover
          :src="'data:image/*;base64,' + img.image_hash"
        >
        </v-carousel-item>
      </v-carousel>
    </v-sheet>
    <CardRoom :hotel="hotels" />
    <ReviewsSection />
  </v-container>
  <!-- ============Card Room======================== -->
</template>

<script>
//=========Card hotel==== //
import CardRoom from "@/components/Cards/RoomCard.vue";
import api from "@/routes/api";
import ReviewsSection from "@/components/Sections/ReviewsSection.vue";
export default {
  components: { CardRoom, ReviewsSection },
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
        this.hotels = response.data.data;
        this.hotelImgs = response.data.data.images;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
