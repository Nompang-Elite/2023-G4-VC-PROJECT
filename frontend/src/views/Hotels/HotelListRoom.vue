<template>
  <v-container>
    <!-- ----------------Room Tolbar---------------------- -->
    <v-row class="mt-5" style="margin-left: 11%">
      <v-col cols="5">
        <v-text-field
          placeholder="Search"
          density="compact"
          variant="solo"
          rounded="pill"
        ></v-text-field>
      </v-col>

      <v-col cols="2" class="mt-1 d-flex" style="margin: 5%">
        <v-btn class="bg-red-darken-1" rounded="pill">OCCUPIED</v-btn>
        <v-btn class="mx-4 bg-info" rounded="pill">UNOCCUPIED</v-btn>
        <v-btn class="mx-4 bg-info" rounded="pill">Create</v-btn>
      </v-col>
    </v-row>

    <!-- ------------Card Rooms--------------- -->
    <v-table>
      <thead>
        <tr>
          <th class="text-left">Number</th>
          <th class="text-left">Name</th>
          <th class="text-left">Status</th>
          <th class="text-left">Type</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="room in rooms" :key="room.name">
          <td>{{ room.number }}</td>
          <td>{{ room.name }}</td>
          <td>{{ room.status }}</td>
          <td>{{ room.room_type_id }}</td>
          <td class="text-center">
            <v-sheet>
              <v-btn
                class="mx-4 bg-info"
                rounded="pill"
                @click="editRoom(room)"
              >
                Edit
              </v-btn>
              <v-btn
                class="bg-red-darken-1"
                rounded="pill"
                @click="deleteRoom(room)"
              >
                Delete
              </v-btn>
            </v-sheet>
          </td>
        </tr>
      </tbody>
    </v-table>
  </v-container>
</template>
<script>
import api from "@/routes/api";
export default {
  data() {
    return {
      rooms: {},
    };
  },
  beforeMount() {
    // Solution : https://www.w3schools.blog/get-cookie-by-name-javascript-js
    function getCookie(cookieName) {
      let cookie = {};
      document.cookie.split(";").forEach(function (el) {
        let [key, value] = el.split("=");
        cookie[key.trim()] = value;
      });
      return cookie[cookieName];
    }
    api.api_base
      .get("/hotel/rooms", {
        headers: {
          Authorization: `Bearer ${getCookie("access_token")}`,
        },
      })
      .then((res) => {
        console.log(res.data.data);
        this.rooms = res.data.data;
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>
