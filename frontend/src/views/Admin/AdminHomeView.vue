<template>
  <v-container>
    <v-row>
      <v-col cols="8">
        <v-card rounded="xl">
          <v-btn @click.prevent="Admin.registerHotelDialog = !Admin.registerHotelDialog">Register Hotel</v-btn>
          <v-card-text>
            <!-- Users -->
            <v-row>
              <v-col>
                <v-card rounded="xl">
                  <v-card-title>Users</v-card-title>
                </v-card>
              </v-col>
            </v-row>
            <!-- Hotels -->
            <v-row>
              <v-col>
                <v-card rounded="xl">
                  <v-card-title>Hotels</v-card-title>
                </v-card>
              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>
      <v-col cols="4">
        <v-card rounded="xl">
          <v-card-title>Recent Users</v-card-title>
        </v-card>
      </v-col>
    </v-row>
    <AdminRegisterHotelDialog />
  </v-container>
</template>
<script>
import AdminRegisterHotelDialog from "@/components/Dialogs/AdminRegisterHotelDialog.vue";
import { useAdminStore } from "@/store/AdminStore"
import { ref } from "vue"
export default {
  components: { AdminRegisterHotelDialog },
  setup() {
    const Admin = ref(useAdminStore());
    return { Admin }
  }
}
</script>