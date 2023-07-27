<template>
  <v-dialog width="auto" v-model="Hotel.addRoomDialog">
    <v-card width="20rem" class="pa-4" rounded="xl" theme="dark">
      <v-card-title class="mx-2"> Add new rooms </v-card-title>
      <v-card-text>
        <v-form ref="form">
          <v-text-field
            label="Number"
            variant="outlined"
            density="compact"
            rounded="xl"
            type="number"
            :rules="rules"
            v-model="Hotel.addRoomForm.number"
          ></v-text-field>
          <v-text-field
            label="Name"
            variant="outlined"
            density="compact"
            rounded="xl"
            :rules="rules"
            v-model="Hotel.addRoomForm.name"
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
            v-model="Hotel.addRoomForm.room_type_id"
            :rules="[(v) => v !== '' || 'Required']"
          ></v-select>
          <v-btn
            @click.prevent="validAndAdd"
            variant="outlined"
            color="success"
            rounded="xl"
            block
            >Add</v-btn
          >
        </v-form>
      </v-card-text>
    </v-card>
  </v-dialog>
  <v-dialog width="auto" v-model="Hotel.addRoomMsgErrDialog">
    <v-card color="red">
      <v-card-text>
        <v-card-title class="text-center">
          <v-icon icon="mdi-check-circle"></v-icon>
        </v-card-title>
        Incorrect info!
      </v-card-text>
    </v-card>
  </v-dialog>
  <v-dialog width="auto" v-model="Hotel.addRoomMsgDialog">
    <v-card color="success">
      <v-card-text>
        <v-card-title class="text-center">
          <v-icon icon="mdi-check-circle"></v-icon>
        </v-card-title>
        Room has been added!
      </v-card-text>
    </v-card>
  </v-dialog>
</template>
<script>
import { useHotelStore } from "@/store/HotelStore";
import { ref } from "vue";
export default {
  setup() {
    const Hotel = ref(useHotelStore());
    return { Hotel };
  },
  data() {
    return {
      rules: [(v) => (!!v && String(v).length < 40) || "Incorrect"],
    };
  },
  methods: {
    validAndAdd() {
      if (
        this.$refs.form.isValid &&
        this.Hotel.addRoomForm.room_type_id !== null
      ) {
        this.Hotel.addRoom();
        this.Hotel.getRooms();
      } else {
        this.Hotel.addRoomMsgErrDialog = true;
      }
    },
  },
};
</script>
