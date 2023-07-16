<template> 
<!-- ===================Contain-card==================== --> 
  <!-- <h3 class="ma-5" color="red" >Detail Hotel</h3> -->
  <v-sheet > 
    <v-btn class="ma-4" color="orange darken-2" dark  > 
      <v-icon size="large">mdi-chevron-double-left</v-icon> 
      <router-link to="/" class="btn btn-danger btn-lg" >Back</router-link>
    </v-btn>

    <v-col cols="12">
      <v-card
        color="#E0E0E0"
        dark
        class="d-flex mx-auto my-auto"
        height="300"
      >
        <img
          :src="hotel.image"
            :width="350"
        />
        <div>
          <v-card-title class="text-h5">
            {{ hotel.name }}
          </v-card-title>    

          <v-title class="ma-1" color="red">      
            <v-icon size="large">mdi-bank</v-icon>
            <v-title text>  {{ hotel.description }}</v-title><br>  

            <v-icon color="#933" size="large">mdi-map-marker</v-icon>           
            <v-title text>  {{ hotel.location }}</v-title><br>  
          </v-title>
        </div>
      </v-card>
    </v-col>
<!-- ============Card hotel======================== --> 
    <v-row no-gutters>
      <v-col v-for="room in hotel.rooms" :key="room.id" cols="12" sm="6" > 
        <v-col cols="12"> <v-card color="#E0E0E0" dark class="d-flex" > 

          <img :src="room.image" :width="250" :height="180" round /> 
          <div class="mx-5 my-5"> 
            <v-icon size="large">mdi-home</v-icon> 
            <v-title text> {{ room.room_type}}</v-title><br>

            <!-- ======= Loop on property_type of room=====-->
            <v-icon  size="large" v-if="room.property_type === 'Single' ? true : false">mdi-human-child</v-icon>                    
            <v-icon  size="large" v-else>mdi-human-male-female</v-icon>    
            <v-title text> {{ room.property_type }} </v-title><br>

            <v-icon size="large">mdi-block-helper</v-icon>
            <v-title text> {{ room.room_status }} </v-title><br> 

            <v-icon color="#933" size="large">mdi-cash-usd</v-icon>           
            <v-title text> ${{ room.price }} </v-title><br>
          </div>

          <v-card-actions class="mt-16">
            <v-btn variant="outlined" color="red" class="mt-16 me-10">
              Booking
            </v-btn>
          </v-card-actions>
          
          </v-card>
        </v-col>
      </v-col>
    </v-row> 
  </v-sheet> 
</template> 

<script>
import axios from 'axios';

export default {
  data() {
    return {
      hotel: [],
    };
  },
  
  mounted() {
    axios.get(`http://127.0.0.1:8000/api/hotel_room/${this.$route.params.id}`)
      .then(response => {
        this.hotel = response.data.data;
      })
      .catch(error => {
        console.log(error);
      });
    },
  };
</script>