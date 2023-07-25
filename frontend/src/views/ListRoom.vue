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
        <v-toolbar-title class="mr-1">Name</v-toolbar-title>
        <v-toolbar-title class="ml-5">Status</v-toolbar-title>
        <v-toolbar-title class="mr-15">Room-type</v-toolbar-title>
        <v-toolbar-title class="mr-15">Action</v-toolbar-title>
      </v-card-text>

      <!-- -------------- --- Card list of rooms------------------------------->
      <v-card
        class="rounded-xl"
        style="width: 97%; margin: 8px; padding: 5px"
        v-for="(item, index) in items"
        :key="index"
      >
        <v-list-item>
          <v-list-item-content
            class="d-flex"
            style="justify-content: space-between"
          >
            <v-list-item-title>{{ item.roomNumber }}</v-list-item-title>
            <v-list-item-title> {{ item.name }}</v-list-item-title>
            <v-list-item-title>{{ item.Status }}</v-list-item-title>
            <v-list-item-title> {{ item.Room_type }}</v-list-item-title>

      <!-- ----------------------Btn Action-------------------------->
            <v-btnActions>
              <v-btn class="mx-4 bg-info" rounded="pill">{{
                item.actions
              }}</v-btn>
              <v-btn class="bg-red-darken-1 " rounded="pill">{{
                item.action
              }}</v-btn>
            </v-btnActions>
          </v-list-item-content>
        </v-list-item>
      </v-card>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          roomNumber: "101",
          name: "Suoon",
          Status: "Available",
          Room_type: "VIP",
          actions: "Edit",
          action: "Delete",
        },
        {
          roomNumber: "102",
          name: "Luxary",
          Status: "Available",
          Room_type: "VIP",
          actions: "Edit",
          action: "Delete",
        },
        {
          roomNumber: "103",
          name: "Luxary",
          Status: "Available",
          Room_type: "VIP",
          actions: "EDit",
          action: "Delete",
        },
      ],
    };
  },
};
</script>



