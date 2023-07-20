<template>
  <v-container>
    <!-- -----------------------Taskbar of list rooms -------------------------->
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
    <v-card
      style="
        width: 76%;
        background-color: rgb(243, 241, 242);
        margin: auto;
        padding: 10px;
      "
      flat
    >
      <v-toolbar-title class="ml-5">List Of Rooms</v-toolbar-title>
      <!-- -------------- --- Title list of rooms------------------------------->
      <v-card-text class="d-flex">
        <v-toolbar-title class="ml-2">Number</v-toolbar-title>
        <v-toolbar-title class="ml-5">Name</v-toolbar-title>
        <v-toolbar-title class="ml-5">Status</v-toolbar-title>
        <v-toolbar-title class="mr-10">Room-type</v-toolbar-title>
        <v-toolbar-title class="mr-3">Action</v-toolbar-title>
      </v-card-text>

      <!-- -------------- --- Card list of rooms------------------------------->
      <v-card
        class="rounded-xl"
        style="width: 97%; margin: 8px; padding: 5px"
        v-for="(room, index) in rooms"
        :key="index"
      >
        <v-list-room>
          <v-list class="d-flex" style="justify-content: space-between">
            <v-list-room-title>{{ room.number }}</v-list-room-title>
            <v-list-room-title> {{ room.name }}</v-list-room-title>
            <v-list-room-title>{{ room.status }}</v-list-room-title>
            <v-list-room-title> {{ room.room_type_id }}</v-list-room-title>

            <!-- ----------------------Btn Action-------------------------->
            <v-action>
              <v-btn class="mx-4 bg-info" rounded="pill"> Edit </v-btn>
              <v-btn class="bg-red-darken-1" rounded="pill"> Delete </v-btn>
            </v-action>
          </v-list>
        </v-list-room>
      </v-card>
    </v-card>
  </v-container>
</template>

<script>
import api from "@/routes/api";

export default {
  data() {
    return {
      rooms: [],
    };
  },
  mounted() {
    api.api_base
      .get("/hotel/rooms")
      .then((response) => {
        console.log((this.rooms = response.data.data));
        this.rooms = response.data.data;
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>
