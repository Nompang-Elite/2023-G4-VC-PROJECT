<template>
    <!-- ==========Card Hotel========== -->
    
    <v-col class="mx-auto " cols="12" style="background-color: rgb(138, 142, 144)">
      <v-card color="#E0E0E0" dark class="d-flex mx-auto my-auto" height="400">
        <div   style="background-color: aqua; margin-right: 30px; ">
        <img
          src="https://media.istockphoto.com/id/104731717/photo/luxury-resort.jpg?s=612x612&w=0&k=20&c=cODMSPbYyrn1FHake1xYz9M8r15iOfGz9Aosy9Db7mI="
          :width="500" :height="400" />
        </div>
          <div style="margin-top: 20px;">
              <v-card-title class="text-h4 text-light" >
                Name : {{ hotel.name}} 
                <v-icon color="yellow" size="small">mdi-star</v-icon>
                <v-icon color="yellow" size="small">mdi-star</v-icon>
                <v-icon color="yellow" size="small">mdi-star</v-icon>
                <v-icon color="yellow" size="small">mdi-star</v-icon>
              </v-card-title><br>


          <v-title v-for="hotelInfo in hotel.hotel_infos" :key="hotelInfo.id" class="ma-1" >
            <v-icon size="large">mdi-map-marker</v-icon>
            <v-title text> Address : {{ hotelInfo.address }}, {{ hotelInfo.city }}, {{ hotelInfo.country }}. </v-title><br>
            
            <v-icon size="large">mdi-message</v-icon>
            <v-title text>  Email: {{ hotelInfo.email }} </v-title><br />
            
            <v-icon size="large">mdi-phone</v-icon>
            <v-title text> Phone contect : {{ hotelInfo.phone }} </v-title><br />
          </v-title>
          <v-icon color="#993333" size="large">mdi-map-marker</v-icon>
          <v-title text> Description : {{ hotel.description}}</v-title><br />
        </div>
      </v-card>
    </v-col><br><br>
</template>
<script>
export default {
  // Proping the items list
  props: ["hotel",]
};
</script>

