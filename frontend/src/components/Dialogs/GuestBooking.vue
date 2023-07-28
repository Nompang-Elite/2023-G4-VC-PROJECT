<template>
  <v-dialog v-model="Guest.bookingDialog" width="auto">
    <v-card width="50rem" rounded="xl" class="pa-4" color="#F1FAEE">
      <v-card-text>
        <v-row>
          <v-col cols="4">
            <v-img
              cover
              height="100%"
              class="rounded-xl"
              :src="
                'data:image/*;base64,' + Guest.roomType.images[0].image_hash
              "
            >
            </v-img>
          </v-col>
          <v-col cols="8">
            <v-card-title> {{ Guest.roomType["name"] }}</v-card-title>
            <v-card-subtitle
              >Max compacity: {{ Guest.roomType["max_capacity"] }}
            </v-card-subtitle>
            <v-sheet class="pa-4 text-justify" color="#F1FAEE">
              <span>Price: {{ Guest.roomType["price"] }}$ <br /> </span>
              <span>Bed: {{ Guest.roomType["bed_count"] }} <br /> </span>
              <span>Avalable: {{ Guest.roomType["count"] }} <br /> </span>
              <span>
                {{ Guest.roomType["description"] }}
              </span>
            </v-sheet>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-carousel height="300" hide-delimiters cycle interval="3500">
              <!-- Carousel Item -->
              <v-carousel-item
                v-for="(room, i) in Guest.roomType.images"
                :key="i"
              >
                <v-img
                  aspect-ratio="16/9"
                  cover
                  class="rounded-xl"
                  :src="'data:image/*;base64,' + room.image_hash"
                >
                  <!-- :src="'data:image/*;base64,' + room.image_hash" -->
                </v-img>
                <!-- <v-sheet color="black" height="100%">
                  {{ room.image_hash }}
                </v-sheet> -->
              </v-carousel-item>
            </v-carousel>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-text-field
              variant="outlined"
              rounded="xl"
              label="Rooom count"
              type="number"
              v-model="Guest.bookingForm.number_of_room"
            >
            </v-text-field>
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
            <v-col cols="6">
              <v-btn
                @click.prevent="Guest.bookRoom"
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
  <v-dialog width="auto" v-model="Guest.errorBookingDialog">
    <v-card color="red">
      <v-card-text>
        <v-card-title class="text-center">
          <v-icon icon="mdi-alert"></v-icon>
        </v-card-title>
        Password or Email is incorrect!
      </v-card-text>
    </v-card>
  </v-dialog>
  <v-dialog width="auto" v-model="Guest.loginAlert">
    <v-card color="red">
      <v-card-text>
        <v-card-title class="text-center">
          <v-icon icon="mdi-alert"></v-icon>
        </v-card-title>
        Please login to continues!
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
