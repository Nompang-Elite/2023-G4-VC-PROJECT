<template>
 
<!-- ===================Contain-card==================== -->
  <v-sheet >
    <v-btn color="orange darken-2" dark> 
      <v-icon dark left>arrow_back</v-icon>Back
    </v-btn>
    <v-col cols="12">
      <v-card
        color="#E0E0E0"
        dark
        class="d-flex mx-auto my-auto"
        height="300"
      >
        <img
          src="https://ak-d.tripcdn.com/images/1mc3l12000aeuijk937A8_R_960_660_R5_D.jpg"
            :width="350"
        />
        <div>
          <v-card-title class="text-h5">
            SUN & MOON, Riverside Hotel Marks
          </v-card-title>
        
          <v-title class="ma-1" color="red">        
            <v-icon size="large">mdi-bank</v-icon>
            <v-title text>  
              Waterfront, Norodom Blvd. (Near Phreak Monivong Bridge), Village 10 Sangkat Tonle Bassac, 12204, Phnom Penh. </v-title><br>  
            </v-title>
        </div>
      </v-card>
    </v-col>
<!-- ============First card======================== -->
  <v-row no-gutters>
    <v-col
      v-for="n in 2"
        :key="n"
        cols="12"
        sm="6"
    >
      <v-col cols="12">
        <v-card
          color="#E0E0E0"
          dark
          class="d-flex"
        >

        <img
          src="https://dam-assets.au.reastatic.net/images/w_6790,h_3899/v1658446132/news-lifestyle-content-assets/wp-content/production/Ace-Family-Size-family2-blue-bed-front-view-hi-res/Ace-Family-Size-family2-blue-bed-front-view-hi-res.jpg?_i=AA"
            :width="250"
            :height="180"
            round
        />
          <div class="mx-5 my-5">
            <v-icon size="large">mdi-home</v-icon>
            <v-title text> VIP</v-title><br>  
              <v-icon size="large">mdi-key</v-icon>                    
            <v-title text> Room Number </v-title><br>
              <v-icon size="large">mdi-home</v-icon>
            <v-title text> Family room </v-title><br> 
              <v-icon size="large">mdi-home</v-icon>         
            <v-title text> $500 </v-title><br>
          </div>
  
          <v-card-actions>
            <v-btn color="red" class="mt-7">
              Booking
            </v-btn>     
          </v-card-actions>
        </v-card>
      </v-col>
    </v-col>
  </v-row>
<!-- ============Second card======================== -->

    <v-row no-gutters>
      <v-col
        v-for="n in 2"
          :key="n"
          cols="12"
          sm="6"
      >
        <v-col cols="12">
          <v-card
            color="#E0E0E0"
            dark
            class="d-flex"
          >
            <!-- //image in card -->
          <img
            src="https://images.unsplash.com/photo-1615874959474-d609969a20ed?ixlib=r4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YmVkJTIwcm9vbXxlbnwwfHwwfHx8MA%3D%3D&w=470&q=30&h=700"
              :width="250"
              :height="180"
              round
          />
            <div class="mx-5 my-5">
              <v-icon size="large">mdi-home</v-icon>
              <v-title text> VIP</v-title><br>  
               <v-icon size="large">mdi-key</v-icon>                    
              <v-title text> Room Number </v-title><br>
               <v-icon size="large">mdi-home</v-icon>
              <v-title text> Family room </v-title><br> 
               <v-icon size="large">mdi-home</v-icon>         
              <v-title text> $500 </v-title><br>
            </div>
   
            <v-card-actions>
              <v-btn color="red" class="mt-7">
                Booking
              </v-btn>     
            </v-card-actions>
          </v-card>
        </v-col>
      </v-col>
    </v-row>
<!-- ============Third card======================== -->  
    <v-row no-gutters>
      <v-col
        v-for="n in 2"
          :key="n"
          cols="12"
          sm="6"
      >
        <v-col cols="12">
          <v-card
            color="#E0E0E0"
            dark
            class="d-flex"
          >
            <!-- // -->
          <img
            src="https://hotelhavanabulgaria.com/wp-content/uploads/2020/07/single-room-1.jpg"
              :width="250"
              :height="180"
              round
          />
            <div class="mx-5 my-5">
              <v-icon size="large">mdi-home</v-icon>
              <v-title text> VIP</v-title><br>  
               <v-icon size="large">mdi-key</v-icon>                    
              <v-title text> Room Number </v-title><br>
               <v-icon size="large">mdi-home</v-icon>
              <v-title text> Family room </v-title><br> 
               <v-icon size="large">mdi-home</v-icon>         
              <v-title text> $500 </v-title><br>
            </div>
            <!-- ///button -->
            <v-card-actions>
              <v-btn color="red" class="mt-7">
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
export default {
  data() {
    return {
      slides: ["First", "Second", "Third", "Fourth", "Fifth"],
    };
  },
};
</script>
