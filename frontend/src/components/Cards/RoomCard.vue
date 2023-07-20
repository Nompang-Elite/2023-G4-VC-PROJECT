<template><br><br>
      <!-- ============Card Room======================== -->
    <h1>Rooms</h1>

    <v-row >
      <v-col  class="mx-auto" cols="5" v-for="(item, i) in hotel.rooms" :key="i" >
        <!-- Set card hovering effect -->
        <v-hover v-slot="{ isHovering, props }">
          <!-- Source Idea: https://vuetifyjs.com/en/components/hover/  -->
          <v-card style="display: flex;"
            class="mx-auto"
            max-width="1000"
            rounded="xl"
            :elevation="isHovering ? 12 : 2"
            :class="{ 'on-hover': isHovering }"
            v-bind="props"
          >
          <div>
            <v-img
              class="align-end text-white"
              height="200"
              :src="item.image"
              cover
            >
            </v-img>
          </div>
          <div>
            <v-card-title>{{ item.name }}</v-card-title>

            <v-card-subtitle class="pt-4">
              {{ item.number }}
            </v-card-subtitle>

            <v-card-text class="card-text">
              <div>{{ item.status }}</div>
            </v-card-text>

            <v-spacer></v-spacer>
            <v-btn rounded="xl" color="info" variant="elevated" class="px-4 ml-4" @click="goToDetail(item.id)">
              Details
            </v-btn>
            <v-card-actions class="ma-2">
              <!-- Rating point -->
              <div v-for="i in hotel" :key="i">
                <v-icon color="yellow">{{ i}} mdi-star</v-icon>
              </div>
          </v-card-actions>
          </div>
          </v-card>
        </v-hover>
      </v-col>
    </v-row>


<!-- 
    <v-col class="d-flex mx-auto" cols="12" style="gap: 10px;">
            <v-card  color="#E0E0E0" dark class="d-flex w-50" >
                <img
                src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?cs=srgb&dl=pexels-pixabay-164595.jpg&fm=jpg"
                :width="250" :height="180" round />
                <div class="mx-5 my-5" v-for="room in hotel.rooms" :key="room.id">
                <v-icon size="large">mdi-home</v-icon>
                <v-title text>{{ room.id }}</v-title><br />


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
        {{ hotel.rooms }} -->

</template>

<script>
export default {
  // Proping the items list
  props: ["hotel",]
};
</script>