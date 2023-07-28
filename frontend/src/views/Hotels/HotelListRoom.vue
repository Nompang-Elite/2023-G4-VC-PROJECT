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
        <v-btn
          @click.prevent="Hotel.addRoomDialog = !Hotel.addRoomDialog"
          class="mx-4 bg-info"
          rounded="pill"
          >+ Add Room
        </v-btn>
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
                @click="getData(room.id)"
              >
                Edit
              </v-btn>
              <v-btn
                class="bg-red-darken-1"
                rounded="pill"
                @click="deleteRoom(room.id)"
              >
                Delete
              </v-btn>
            </v-sheet>
          </td>
        </tr>
      </tbody>
    </v-table>
    <HotelAddRoomDialog />
    <!-- ------------------Dialog edit room---------------- -->
    <v-dialog width="auto" v-model="dialogShow">
      <v-card width="20rem" class="pa-4" rounded="xl" theme="dark">
        <v-card-title class="mx-2"> Add new rooms </v-card-title>
        <v-card-text>
          <v-form ref="form">
            <v-text-field
              label="Number"
              variant="outlined"
              density="compact"
              rounded="xl"
              type="text"
              :rules="rules"
              v-model="number"
            ></v-text-field>
            <v-text-field
              label="Name"
              variant="outlined"
              density="compact"
              rounded="xl"
              :rules="rules"
              v-model="name"
              type="text"
            ></v-text-field>
            <v-select
              :items="Hotel.roomType"
              density="compact"
              variant="outlined"
              label="Room type"
              rounded="xl"
              item-title="name"
              item-value="id"
              v-model="roomType"
              :rules="[(v) => v !== '' || 'Required']"
            ></v-select>

            <v-btn
              class="mb-5"
              @click="cancel()"
              variant="outlined"
              color="success"
              rounded="xl"
              block
              >Cancel</v-btn
            >
            <v-btn
              variant="outlined"
              color="success"
              rounded="xl"
              block
              @click="editData()"
              >Edit</v-btn
            >
          </v-form>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-container>
</template>
<script>
import { useHotelStore } from "@/store/HotelStore.js";
import HotelAddRoomDialog from "@/components/Dialogs/HotelAddRoomDialog.vue";
import { reactive, computed } from "vue";
import axios from "axios";
export default {
  data() {
    return {
      dialogShow: false,
      number: null,
      name: null,
      roomType: null,
    };
  },
  components: { HotelAddRoomDialog },
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
  beforeCreate() {
    this.Hotel.getRooms();
    this.Hotel.getRoomType();
  },
  // ------------Function getRoom  edit ------------------------

  methods: {
    //Function Get room
    getData(id) {
      localStorage.setItem("room_id", id);
      axios
        .get(`http://127.0.0.1:8000/api/roomId/${id}`)
        .then((res) => {
          console.log(res.data.data);
          this.name = res.data.data.name;
          this.roomType = res.data.data.room_type_id;
          this.number = res.data.data.number;
          this.dialogShow = true;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    //Function Edit room
    editData() {
      const id = localStorage.getItem("room_id");
      const data = {
        name: this.name,
        number: this.number,
        room_type_id: this.roomType,
      };
      axios
        .put(`http://127.0.0.1:8000/api/hotel/editRoom/${id}`, data)
        .then((res) => {
          console.log(res.data.data);
          this.dialogShow = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    //Function delete room
    deleteRoom(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/hotel/deleteRoom/${id}`)
        .then((res) => {
          console.log(res.data.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    //Cancle
    cancel() {
      this.dialogShow = false;
    },
  },
};
</script>
