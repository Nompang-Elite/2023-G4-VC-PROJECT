<template>
  <v-dialog v-model="Guest.bookingDialog" width="auto">
    <v-card width="50rem" rounded="xl" class="pa-4">
      <v-card-text>
        <v-row>
          <v-col cols="4"> </v-col>
          <v-col cols="8">
            <v-card-title> Card name </v-card-title>
            <v-card-subtitle> Card name </v-card-subtitle>
            <v-sheet class="pa-4 text-justify">
              <span>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim
                illum officia doloremque at? In totam ratione nihil tenetur
                debitis, dolorem suscipit qui quod ab iste harum laudantium
                dolor, voluptates tempora?
              </span>
            </v-sheet>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-carousel height="300" hide-delimiters cycle interval="3500">
              <!-- Carousel Item -->
              <v-carousel-item v-for="(room, i) in Guest.roomImgs" :key="i">
                <v-img aspect-ratio="16/9" cover>
                  <!-- :src="'data:image/*;base64,' + room.image_hash" -->
                </v-img>
                <v-sheet color="black" height="100%">
                  {{ room.image_hash }}
                </v-sheet>
              </v-carousel-item>
            </v-carousel>
          </v-col>
        </v-row>

        <v-card-actions class="mt-4">
          <v-row>
            <v-col cols="6">
              <VueDatePicker
                :clearable="false"
                disable-year-select
                placeholder="From : To Date"
                model-type="dd.MM.yyyy"
                v-model="Guest.date"
                :min-date="Guest.date.startDate"
                range
              />
            </v-col>

            <v-col cols="3">
              <v-text-field
                variant="solo"
                rounded="xl"
                label="Rooom count"
                type="number"
              >
              </v-text-field>
            </v-col>
            <v-col cols="3">
              <v-btn
                @click.prevent="Guest.bookRoomType"
                block
                variant="elevated"
                color="info"
                rounded="xl"
              >
                Booking
              </v-btn>
            </v-col>
          </v-row>
        </v-card-actions>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { useGuestStore } from "@/store/GuestStore";
import { ref } from "vue";
export default {
  components: { VueDatePicker },
  setup() {
    const Guest = ref(useGuestStore());
    return { Guest };
  },
  onMount() {
    // Set end date to 7 day max
    this.Guest.date.endDate = new Date(
      new Date().setDate(this.Guest.date.startDate.getDate() + 7)
    );
  },
};
</script>
