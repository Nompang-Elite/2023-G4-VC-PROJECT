<template>
  <Carousel :slides="hotels" />
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
    };
  },
  mounted() {
    api.api_base
      .get("/hotel")
      .then((res) => {
        // console.log(this.hotels = res.data.data);
        this.hotels = res.data.data;
      })
      .catch((err) => console.log(err));
  },
};
</script>
