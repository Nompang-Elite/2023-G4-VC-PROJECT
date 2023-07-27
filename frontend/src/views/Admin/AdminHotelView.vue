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
    <tbody >
      <tr v-for="hotel in hotels" :key="hotel.id">
        <td>{{ hotel.hotel_id }}</td>
        <td>{{ hotel.postal_code}}</td>
        <td>{{ hotel.email}}</td>
        <td>{{ hotel.city}}</td>
        <td>{{ hotel.country}}</td>
        <td>{{ hotel.address}}</td>
        <td class="d-flex mt-5">
        
        <!-- =============Edit hotel info dialog=============== -->
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
              style="background-color: blue;"
              @click="editHotel(hotel.id)"
              >Manage</v-btn>
            </template>
            <v-card>
                <v-card-title>
                  <span class="text-h5">Update Hotel</span>
                </v-card-title>
              <v-card-text >
                <v-container >
                  <v-row>                 
                      <v-card-text>
                        <v-form ref="form" v-model="valid">
                          <v-text-field v-model="editedHotel.hotel_id" label="Hotel ID"></v-text-field>
                          <v-text-field v-model="editedHotel.postal_code" label="Postal Code"></v-text-field>
                          <v-text-field v-model="editedHotel.email" label="Email"></v-text-field>
                          <v-text-field v-model="editedHotel.city" label="City"></v-text-field>
                          <v-text-field v-model="editedHotel.country" label="Country"></v-text-field>
                          <v-text-field v-model="editedHotel.address" label="Address"></v-text-field>
                        </v-form>
                      </v-card-text>

                 
                  </v-row>
                </v-container>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  style="background-color:blue;"
                  rounded="pill"
                  color="white"
                  variant="text"
                  @click="updateHotel(hotel.id)" 
                >
                  Save
                </v-btn>
                <v-btn
                  style="background-color:red;"
                  rounded="pill"
                  color="white"
                  variant="text"
                  @click="dialog = false"
                >
                  Close
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-btn

          rounded="pill"  
          color="white"
          variant="text" 
          style="background-color: red;"
          @click="removeHotelInfo(hotel.id)">Remove</v-btn> 
                
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
        editedHotel:[],
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
        .get(`/admin/hotelInfo`)
        .then((res) => {
          this.hotels = res.data.data;
        })
        .catch((err) => console.log(err));
      },

      // ================edit=============

      editHotel(id) {
      this.editedIndex = id;
      this.editedHotel = Object.assign({}, this.hotels[id]);
      this.dialog = true;
      },

      updateHotel() {
        const hotel = this.editedHotel;
        api.api_base
        .put(`/admin/hotelInfoUpdate/${id}`, hotel)
        .then((res) => {
          let data = res.data.data
          console.log(data)
          this.hotels.splice(this.editedIndex, 1, Object.assign({}, hotel));
          this.dialog = false;
        })
        .catch(error => {
        console.log(error);
        })
      },
      removeHotelInfo(id){
        if(confirm('Are you sure, you want to delete this data?')){
          api.api_base
          .delete(`/admin/hotelInfo/${id}`)
          .then(response =>{
            alert(response.data.message);
            this.getHotels();
          })
          .catch(function(error){
              if(error.response){
                if(error.response.status == 404){
                  alert(error.response.data.message);
                }
              }
          });
        }
      }
    }
   
}
</script>
