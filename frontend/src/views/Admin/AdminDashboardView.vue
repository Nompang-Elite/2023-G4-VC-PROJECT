<template>
    <v-sheet class="d-flex flex-row pa-10">
      <v-row>
        <v-col cols="8">
  <!--------------------- Users List ----------------------->
          <v-card-title>Users</v-card-title>
          <v-sheet class="bg-warning pa-2" rounded="lg">
            <v-card
              v-for="(guest, i) in guests"
              :key="i"
              class="d-flex my-5"
              rounded="lg"
              height="50"
            >
              <v-img
                :src="guest.img"
                style="margin-right: 50%"
                cover
              ></v-img>
              <v-card-title class="mx-16">{{ guest.firstname }}</v-card-title>
            </v-card>
          </v-sheet>
        </v-col>
  <!------------------ Current Users ------------------>
        <v-col cols="4">
          <v-card-title>Current Users</v-card-title>
          <v-sheet class="bg-warning pa-2 position-absolute" rounded="lg">
            <v-card
              v-for="(user, i) in current_users"
              :key="i"
              class="d-flex my-5"
              rounded="lg"
              height="50"
            >
              <v-img
                :src="user.img"
                rounded="lg"
                class="me-13"
  
                cover
              ></v-img>
              <v-card-title class="mx-8">{{ user.name }}</v-card-title>
            </v-card>
          </v-sheet>
        </v-col>
  <!---------------------- Hotels List --------------------->
        <v-col cols="8">
          <v-card-title>Hotels</v-card-title>
          <v-sheet class="bg-warning pa-2" rounded="lg">
            <v-card
              v-for="(hotel, i) in hotels"
              :key="i"
              class="d-flex my-5"
              rounded="lg"
              height="50"
            >
              <v-img
                :src="user.img"
                style="margin-right: 50%"
                cover
              ></v-img>
              <v-card-title class="mx-16">{{ user.name }}</v-card-title>
            </v-card>
          </v-sheet>
        </v-col>
      </v-row>
      </v-sheet>
  </template>
  <script>
  import api from "@/routes/api";
  export default {
    data() {
      return {
        guests: [],
        owners: [],
      };
    },
    mounted() {
        api.api_base
        .get('/admin/users/guest')
        .then((res) => {
            let data = res.data.data;
            return this.guests.push(data);
        })
        .catch((err) => {
            console.log(err);
        })
        // console.log(this.guests.firstname);
    }
  };
  </script>
  