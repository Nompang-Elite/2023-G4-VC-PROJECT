<template><br><br>
      <!-- ============Card Room======================== -->
    <h1>Rooms</h1>
    <v-col class="d-flex mx-auto" cols="12" style="gap: 10px;">
            <v-card  color="#E0E0E0" dark class="d-flex w-50" >
                <img
                src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?cs=srgb&dl=pexels-pixabay-164595.jpg&fm=jpg"
                :width="250" :height="180" round />
                <div class="mx-5 my-5">
                <v-icon size="large">mdi-home</v-icon>
                <v-title text>room_typ</v-title><br />


                <v-icon size="large">mdi-human-child</v-icon>
    
                <v-title text> property_type </v-title><br />

                <v-icon size="large">mdi-block-helper</v-icon>
                <v-title text>room_status </v-title><br />

                <v-icon color="#933" size="large">mdi-cash-usd</v-icon>
                <v-title text> price</v-title><br />
                </div>

                <v-card-actions class="mt-16">
                <v-btn rounded="xl" color="info" variant="elevated" class="mt-10 me-4">
                More info
              </v-btn>
                </v-card-actions>
            </v-card>
          <v-card color="#E0E0E0" dark class="d-flex w-50" >
            <img
              src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?cs=srgb&dl=pexels-pixabay-164595.jpg&fm=jpg"
              :width="250" :height="180" round />
            <div class="mx-5 my-5">
              <v-icon size="large">mdi-home</v-icon>
              <v-title text>room_typ</v-title><br />


              <v-icon size="large">mdi-human-child</v-icon>

              <v-title text> property_type </v-title><br />

              <v-icon size="large">mdi-block-helper</v-icon>
              <v-title text>room_status </v-title><br />

              <v-icon color="#933" size="large">mdi-cash-usd</v-icon>
              <v-title text> price</v-title><br />
            </div>

            <v-card-actions class="mt-16">
                <v-btn rounded="xl" color="info" variant="elevated" class="mt-10 me-4">
                More info
              </v-btn>
            </v-card-actions>
          </v-card>
    </v-col>

</template>