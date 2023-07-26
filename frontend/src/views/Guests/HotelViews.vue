<template>
  <v-container style="margin-top: 20px;">
    <header class="font-weight-bold d-flex flex=2 " style="margin-bottom: 1rem">
      <h1 style="flex: 1.3;">HOTELS IN PROVINCCE</h1>
      <v-select
        label="Select location"
        v-model="selectedLocation"
        :items="[
            'Phnom Penh',
            'Banteay Meanchey', 
            'Kampong Chhnang', 
            'Siem Reap', 
            'Kampong Cham',
            'Kampong Chhnang', 
            'Kampong Speu',
            'Battambang', 
            'Prey Veng',
            'Kampong Thom',
            'Kampot',
            'Kandal',
            'Koh Kong',
            'Kratie',
            'Mondulkiri',
            'Preah Vihear',
            'Pursat',
            'Ratanakiri',
            'Preah Sihanouk',
            'Stung Treng',
            'Svay Rieng',
            'Takeo',
            'Oddar Meanchey',
            'Kep',
            'Pailin',
            'Tboung Khmum'
          ]"
        variant="outlined"
        style="flex: 0.7; color: rgb(9, 39, 122);"
      ></v-select>
            
    </header><br><br>
      <!-- Card container -->
    <v-row >
      <v-col cols="4" v-for="(item, i) in hotels" :key="i">
        <!-- Set card hovering effect -->
        <v-hover v-slot="{ isHovering, props }">
          <!-- Source Idea: https://vuetifyjs.com/en/components/hover/  -->
          <v-card
            class="mx-auto"
            max-width="400"
            rounded="xl"
            :elevation="isHovering ? 12 : 2"
            :class="{ 'on-hover': isHovering }"
            v-bind="props"
          >
            <v-img
              class="align-end text-white"
              height="200"
              :src="'data:image/*;base64,' + item.image_hash"
              cover
            >
            </v-img>

            <v-card-title>{{ item.name }}</v-card-title>

            <v-card-subtitle class="pt-4">
              {{ item.location }}
            </v-card-subtitle>

            <v-card-text class="card-text">
              <div>{{ item.description }}</div>
            </v-card-text>

            <v-card-actions class="ma-2">
              <!-- Rating point -->
              <v-rating
                color="yellow"
                size="20"
                v-model="item.rate"
                disabled
              ></v-rating>
              <v-spacer></v-spacer>
              <v-btn
                rounded="xl"
                color="info"
                variant="elevated"
                class="px-4"
                @click="goToDetail(item.id)"
              >
                Details
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-hover>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import api from "@/routes/api";
export default {
  data() {
    return {
      selectedLocation:"",
      hotels: [],

    };
  },
  computed: {
    
    filteredHotels() {
  
      if (this.selectedLocation === "") {
        // If no location is selected, return all hotels
        return this.hotels;
      }
       else if(this.hotels.location === this.selectedLocation) {
         // Otherwise, filter hotels by selected location
         return "Not found"
      }
      else {
        return this.hotels.filter(hotel => hotel.location === this.selectedLocation);
      }
    }
  },
  methods: {
    goToDetail(id) {
      console.log(id);
      // Navigate to the detail page with the selected hotel's ID as a parameter
      this.$router.push(`/hotel/${id}`);
    }
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

