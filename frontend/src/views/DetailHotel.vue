<template>
  <!-- ===================Contain-card==================== -->
    <v-sheet width="1400" class="mx-auto">
      <v-card-text>
        <v-btn to="/" class="ma-4" color="blue darken-2" dark>
          <v-icon size="large">mdi-chevron-double-left</v-icon>
          Back    
        </v-btn>
      </v-card-text>

  <!-- ======Card hotel======== -->
        <Card :hotel="hotels"/>

    <!-- ============slind Image hotel======================== -->
        <v-sheet elevation="2" max-width="1300"  class="mx-auto rounded-xl">
          <v-carousel hide-delimiters show-arrows="hover" height="300" class="rounded-xl">
            <v-carousel-item 
              
                v-for="(roomImg, i) in roomImgs"
                :key="i"
                cover
                :src="roomImg.img"
                >
            
            </v-carousel-item>
          </v-carousel>
        </v-sheet>
      <!-- ============Card Room======================== -->
        <CardRoom />  
    </v-sheet>

   
</template>

<script>
//=========Card hotel==== //
import Card from "@/components/Cards/HotelDetailCard.vue";
import CardRoom from "@/components/Cards/RoomCard.vue";
import api from "@/routes/api";


export default {
  components: { Card,CardRoom },
  data() {
    return {
      hotels: [],
      roomImgs: [
        {
          img: "https://hotelxtoronto.com/_novaimg/4906918-1481330_0_0_2200_1200_2200_1200.rc.jpg",
        },
        {
          img: "https://images.unsplash.com/photo-1625244724120-1fd1d34d00f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWwlMjBsb2JieXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80",
        },
        {
          img: "https://images.squarespace-cdn.com/content/v1/55c81c1fe4b0b6c7b4aaeae6/1609339613903-KCORCO6FDJVEWSLWIURT/Siem+reap+Cambodia+Professional+photographer.jpg?format=2500w",
        },
        {
          img: "https://cdn.loewshotels.com/loewshotels.com-2466770763/cms/cache/v2/5f5a6e0d12749.jpg/1920x1080/fit/80/86e685af18659ee9ecca35c465603812.jpg",
        },
      ],
    };
  },

  mounted() {
    api.api_base
      .get(`/hotel/info/${this.$route.params.id}`)
      .then((response) => {
        console.log(this.hotel = response.data.data);
        this.hotels = response.data.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
