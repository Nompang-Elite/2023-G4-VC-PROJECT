<template>
  <v-container>
    <!-- ----------------Room Tolbar---------------------- -->
    <v-row class="mt-5">
      <v-col cols="5">
        <v-text-field
          v-model="Hotel.search"
          placeholder="Search"
          density="compact"
          variant="solo"
          rounded="pill"
        ></v-text-field>
      </v-col>

      <v-col cols="2" class="mt-1 d-flex" style="margin: 5%">
        <v-btn
          class="bg-red-darken-1"
          rounded="pill"
          @click="Hotel.filterRooms('occupied')"
        >
          OCCUPIED
        </v-btn>
        <v-btn
          class="mx-4 bg-info"
          rounded="pill"
          @click="Hotel.filterRooms('unoccupied')"
        >
          UNOCCUPIED
        </v-btn>
        <v-btn class="mx-4 bg-info" rounded="pill">+ Add Room </v-btn>
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
        <tr v-for="room in filteredRooms" :key="room.name">
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
import { useHotelStore } from "@/store/HotelStore.js";
import { reactive, computed } from "vue";
export default {
  //operation api of pinia
  setup() {
    const Hotel = reactive(useHotelStore());
    // ------------Use for search name in rooms ------------------------
    const filteredRooms = computed(() => {
      if (Hotel.search) {
        return Hotel.rooms.filter(
          (room) =>
            room.name.toLowerCase().includes(Hotel.search.toLowerCase()) ||
            room.number.toLowerCase().includes(Hotel.search.toLowerCase())
        );
      } else {
        return Hotel.rooms;
      }
    });
    return { Hotel, filteredRooms };
  },

  beforeMount() {
    this.Hotel.getRooms();
  },
};
</script>
