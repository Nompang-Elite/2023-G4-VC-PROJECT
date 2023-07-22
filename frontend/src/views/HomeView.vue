<template>
  <Carousel :slides="topHotels" />
  <!-- Using the items props to pass down the data list for card -->
  <Card :items="hotels" container-name="Top Reviews" />
  <ReviewsSection />
</template>
<script>
import Carousel from "@/components/Others/CarouselCover.vue";
import Card from "@/components/Cards/HotelCard.vue";
import ReviewsSection from "@/components/Sections/ReviewsSection.vue";
import api from "@/routes/api";
export default {
  components: { Carousel, Card, ReviewsSection },
  data() {
    return {
      hotels: [],
      topHotels: [
        {
          name: "Angkor",
          rate: 4,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
          image:
            "http://www.offtoeurope.com/wp-content/uploads/2010/06/radisson-pool.jpg",
        },
        {
          name: "SiemReap",
          rate: 4,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
          image:
            "https://images.pexels.com/photos/189296/pexels-photo-189296.jpeg?cs=srgb&dl=blue-exotic-hotel-189296.jpg&fm=jpg",
        },
        {
          name: "SiemReap",
          rate: 1,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
          image: "http://travelji.com/wp-content/uploads/Hotel-Tips.jpg",
        },
        {
          name: "Angkor",
          rate: 3,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
          image:
            "https://media.architecturaldigest.com/photos/57e42deafe422b3e29b7e790/master/pass/JW_LosCabos_2015_MainExterior.jpg",
        },
        {
          name: "SiemReap",
          rate: 4,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
          image:
            "https://images.pexels.com/photos/2034335/pexels-photo-2034335.jpeg?cs=srgb&dl=architecture-building-chairs-2034335.jpg&fm=jpg",
        },
        {
          name: "SiemReap",
          rate: 5,
          description: "lkadjfajdlkfaldjf;ajdlfkja;dfk",
          location: "Phnom Penh",
          image:
            "https://blog.trustico.com/wp-content/uploads/2016/08/hotel2.jpg",
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
