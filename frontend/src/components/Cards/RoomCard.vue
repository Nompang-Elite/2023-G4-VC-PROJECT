<template><br><br>
      <!-- ============Card Room======================== -->
    <h1>Rooms</h1>
    <v-row >
      <v-col  class="mx-auto" cols="5" v-for="(item, i) in hotel.rooms_type" :key="i" >
        <!-- Set card hovering effect -->
        <v-hover v-slot="{ isHovering, props }">
          <!-- Source Idea: https://vuetifyjs.com/en/components/hover/  -->
          <v-card style="display: flex; "
            class="mx-auto"
            max-width="100%"
            height="200"
            rounded="xl"
            :elevation="isHovering ? 12 : 2"
            :class="{ 'on-hover': isHovering }"
            v-bind="props"
          >
            <img src="https://cdn.loewshotels.com/loewshotels.com-2466770763/cms/cache/v2/5f5a6e0d12749.jpg/1920x1080/fit/80/86e685af18659ee9ecca35c465603812.jpg"
            class="align-end text-white"
            height="200" 
            width="250"  
            cover      

            />

     
          <div>
            <v-card-title class="text-light">{{ item.name }}</v-card-title>

            <v-card-subtitle class="pt-4">
              {{ item.description }}
            </v-card-subtitle>

            <v-card-text class="card-text">
              <h3>${{ item.price }}</h3>
            </v-card-text>
            <v-btn rounded="xl" color="info" variant="elevated" class="px-4 ml-4" @click="goToDetailRoom(item.id)">
              Details
            </v-btn>
            
          </div>
          </v-card>
        </v-hover>
      </v-col>
      
 
    </v-row>
</template>

<script>
export default {
  // Proping the items list
  props: ["hotel",],

  methods: {
    goToDetail(id) { 
      console.log(id);
      // Navigate to the detail page with the selected hotel's ID as a parameter
      this.$router.push(`/hotel/${id}`);
    }
  },
};
</script>
<style>
  h3{
    color: red;
    font-weight: bold;
  }
</style>