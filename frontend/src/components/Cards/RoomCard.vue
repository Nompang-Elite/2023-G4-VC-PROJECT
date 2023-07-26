<template>
  <!-- ============Card Room======================== -->

  <v-sheet class="py-4 text-uppercase">
    <h3>Rooms</h3>
  </v-sheet>
  <v-row>
    <v-col cols="6" v-for="(item, i) in hotel.room_type" :key="i">
      <!-- Set card hovering effect -->
      <v-hover v-slot="{ isHovering, props }">
        <!-- Source Idea: https://vuetifyjs.com/en/components/hover/  -->
        <v-card
          style="display: flex"
          class="mx-auto"
          max-width="100%"
          height="200"
          rounded="xl"
          :elevation="isHovering ? 12 : 2"
          :class="{ 'on-hover': isHovering }"
          v-bind="props"
        >
          <v-row>
            <v-col cols="5">
              <v-img
                cover
                height="100%"
                :src="'data:image/*;base64,' + item.image"
              ></v-img>
            </v-col>
            <v-col cols="7">
              <v-card-title class="text-light text-capitalize">{{
                item.name.replaceAll("_", " ")
              }}</v-card-title>

              <v-card-subtitle class="pt-4">
                {{ item.description }}
              </v-card-subtitle>

              <v-card-text class="card-text">
                <div class="d-flex align-center">
                  <v-icon icon="mdi-bed"></v-icon
                  ><span class="mx-2">{{ item.bed_count }}</span>
                </div>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <h3 class="mr-8">${{ item.price }}</h3>
                <v-btn
                  rounded="xl"
                  color="info"
                  variant="elevated"
                  class="mr-4 px-4"
                  @click="Guest.goToDetailRoom(item.id)"
                >
                  Details
                </v-btn>
              </v-card-actions>
            </v-col>
          </v-row>
        </v-card>
      </v-hover>
    </v-col>
  </v-row>
  <BookingView />
</template>
<script>
import BookingView from "@/views/Guests/BookingView.vue";
import { useGuestStore } from "@/store/GuestStore";
import { ref } from "vue";
export default {
  components: { BookingView },
  setup() {
    const Guest = ref(useGuestStore());
    return { Guest };
  },
  // Proping the items list
  props: ["hotel"],

  methods: {
    goToDetail(id) {
      console.log(id);
      // Navigate to the detail page with the selected hotel's ID as a parameter
      this.$router.push(`/hotel/${id}`);
    },
  },
};
</script>
<style></style>
