<template>
  <Carousel :slides="topHotels" />
  <!-- Using the items props to pass down the data list for card -->
  <Card :items="hotels" container-name="Top Reviews" />
</template>
<script>
import Carousel from "@/components/Others/CarouselCover.vue";
import Card from "@/components/Cards/HotelCard.vue";
import api from "@/routes/api";
export default {
  components: { Carousel, Card },
  data() {
    return {
      hotels: [],
      topHotels: [
        {
          name: "Angkor",
          rate: 4,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
        },
        {
          name: "SiemReap",
          rate: 4,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
        },
        {
          name: "SiemReap",
          rate: 1,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
        },
        {
          name: "Angkor",
          rate: 3,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
        },
        {
          name: "SiemReap",
          rate: 4,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
        },
        {
          name: "SiemReap",
          rate: 5,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
        },
      ],
    };
  },
  mounted() {
    api.api_base
      .get("/hotel")
      .then((res) => {
        this.hotels = res.data.data;
      })
      .catch((err) => console.log(err));
  },
};
</script>
