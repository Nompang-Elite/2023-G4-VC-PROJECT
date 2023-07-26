// This is a link: https://vuetifyjs.com/en/components/tables/
<template>
  <v-row class="mt-1" style="margin-left: 11%;">
          <v-col cols="6">
              <v-text-field
              placeholder="Search"
              density="compact"
              variant="solo"
              rounded="pill"
              ></v-text-field>
          </v-col>
          <v-col cols="2" class="mt-1 d-flex " style="margin: 5%; margin-left: 28%;">
            <v-btn class="mx-6 bg-info" rounded="pill">+ ADD HOTEL</v-btn>
          </v-col>
  </v-row>


  <v-table style="margin-bottom: 12px; width: 90%;margin: auto; background-color: rgb(247, 245, 241);border-radius: 5px;">
    <thead >
      <tr>
        <th class="text-left">Hotel ID</th>
        <th class="text-left">Postal code</th>
        <th class="text-left">Email</th>
        <th class="text-left">City</th>
        <th class="text-left">Country</th>
        <th class="text-left">Address</th>
        <th class="text-left">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(hotel, index) in hotels" :key="index">
        <td>{{ hotel.hotel_id }}</td>
        <td>{{ hotel.postal_code}}</td>
        <td>{{ hotel.email}}</td>
        <td>{{ hotel.city}}</td>
        <td>{{ hotel.country}}</td>
        <td>{{ hotel.address}}</td>
        <td class="d-flex mt-5">
          <v-dialog
            v-model="dialog"
            persistent
            width="600">
            <template v-slot:activator="{ props }">
              <v-btn   v-bind="props"
              class="mr-5 "   
              color="white"
              variant="text"  
              rounded="pill" 
              style="background-color: blue;">Manage</v-btn>
            </template>
            <v-card>
                <v-card-title>
                  <span class="text-h5">Edit Hotel</span>
                </v-card-title>
              <v-card-text >
                <v-container >
                  <v-row>
                    <v-col
                      cols="6"
                    >
                      <v-text-field
                        label="Hotel_name"
                        required
                        density="compact"
                        variant="solo"
                        rounded="pill"
                      ></v-text-field>
                    </v-col>
                    <v-col
                      cols="6"
                    >
                      <v-text-field
                        label="Postal code"
                        density="compact"
                        variant="solo"
                        rounded="pill"
                      ></v-text-field>
                    </v-col>
                    <v-col
                      cols="6"
                    >
                      <v-text-field
                        label="Phone Number"
                        density="compact"
                        variant="solo"
                        rounded="pill"
                        required
                      ></v-text-field>
                    </v-col>
                    <v-col cols="6">
                      <v-text-field
                        label="Email"
                        density="compact"
                        variant="solo"
                        rounded="pill"
                        required
                      ></v-text-field>
                    </v-col>
                    <v-col cols="6">
                      <v-text-field
                        label="city"
                        density="compact"
                        variant="solo"
                        rounded="pill"
                        required
                      ></v-text-field>
                    </v-col>
                    <v-col cols="6">
                      <v-text-field
                        label="Country"
                        density="compact"
                        variant="solo"
                        rounded="pill"
                        required
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12">
                      <v-text-field
                        label="Address"
                        density="compact"
                        variant="solo"
                        rounded="pill"
                        required
                      ></v-text-field>
                    </v-col>
                 
                  </v-row>
                </v-container>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  style="background-color: red;"
                  rounded="pill"
                  color="white"
                  variant="text"
                  @click="dialog = false"
                >
                  Close
                </v-btn>
                <v-btn
                  style="background-color: blue;"
                  rounded="pill"
                  color="white"
                  variant="text"
                  @click="dialog = false"
                >
                  Save
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
      
        <v-btn  
          rounded="pill"  
          color="white"
          variant="text" 
          style="background-color: red;">Remove</v-btn>
                
        </td>
      </tr>
    </tbody>
  </v-table>
</template>

<script>
import api from "@/routes/api";
  export default {
    data () {
      return {
        dialog: false,
        hotels: [],
      }
    },
    mounted() {
    // Call the method on component mount
    this.getHotels(); 
  },
  methods: {
    getHotels() {
        api.api_base
      .get("/admin/hotelInfo")
      .then((res) => {
        console.log(this.hotels = res.data.data);
        this.hotels = res.data.data;
      })
      .catch((err) => console.log(err));
    },
  },
  }
</script>
