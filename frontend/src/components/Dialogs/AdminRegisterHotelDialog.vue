<template>
  <v-dialog v-model="Admin.registerHotelDialog" width="34rem">
    <v-card flat class="pa-4" rounded="xl" theme="dark">
      <v-card-title class="px-8 py-4 text-h4"> Register Hotel </v-card-title>
      <v-card-text>
        <v-card-title class="py-4 text-h6">Owner Informations </v-card-title>

        <v-row>
          <!-- User Name -->
          <v-col cols="6">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="outlined"
              label="First Name"
              v-model="Admin.registerHotelForm.firstname"
            ></v-text-field>
          </v-col>
          <v-col cols="6">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="outlined"
              label="Last Name"
              v-model="Admin.registerHotelForm.lastname"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-text-field
              density="compact"
              variant="outlined"
              rounded="pill"
              label="Phone Number"
              v-model="Admin.registerHotelForm.phone"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-text-field
              density="compact"
              variant="outlined"
              rounded="pill"
              label="Email"
              v-model="Admin.registerHotelForm.email"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="6">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="outlined"
              v-model="Admin.registerHotelForm.password"
              label="Password"
              type="password"
            ></v-text-field>
          </v-col>
          <v-col cols="6">
            <v-text-field
              type="password"
              rounded="pill"
              density="compact"
              variant="outlined"
              label="Confirm Password"
              v-model="Admin.registerHotelForm.password_confirmation"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-select
              density="compact"
              rounded="pill"
              v-model="Admin.registerHotelForm.gender"
              placeholder="Gender"
              :items="['Male', 'Female']"
              variant="outlined"
            ></v-select>
          </v-col>
        </v-row>
        <!-- Hotel -->
        <v-card-title class="py-4 text-h6">Hotel Informations </v-card-title>

        <v-row>
          <v-col cols="12">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="outlined"
              label="Hotel Name"
              v-model="Admin.registerHotelForm.hotel_name"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-text-field
              density="compact"
              variant="outlined"
              rounded="pill"
              label="Phone Number"
              v-model="Admin.registerHotelForm.hotel_phone"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-text-field
              density="compact"
              variant="outlined"
              rounded="pill"
              label="Email"
              v-model="Admin.registerHotelForm.hotel_email"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="6">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="outlined"
              label="City"
              v-model="Admin.registerHotelForm.city"
            ></v-text-field
          ></v-col>
          <v-col cols="6">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="outlined"
              label="Country"
              v-model="Admin.registerHotelForm.country"
            ></v-text-field
          ></v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="outlined"
              label="Postal Code"
              v-model="Admin.registerHotelForm.postal_code"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-text-field
              density="compact"
              variant="outlined"
              rounded="pill"
              label="Address"
              v-model="Admin.registerHotelForm.address"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-textarea
              variant="outlined"
              rounded="xl"
              v-model="Admin.registerHotelForm.description"
              label="Description"
            ></v-textarea>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-card-text>
              <v-file-input
                show-size
                multiple
                prepend-icon="mdi-camera"
                variant="outlined"
                label="Select your image"
                v-model="Admin.hotel_imgs"
                :rules="Hotel.imgRules"
              ></v-file-input>
            </v-card-text>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-btn
              rounded="xl"
              block
              variant="outlined"
              color="info"
              @click.prevent="Admin.registerHotel(Admin.registerHotelForm)"
              >Register</v-btn
            >
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
    <UploadImgDialog />
  </v-dialog>
</template>
<script>
import { useAdminStore } from "@/store/AdminStore";
import { useHotelStore } from "@/store/HotelStore";
import UploadImgDialog from "./UploadImgDialog.vue";
import { ref } from "vue";
export default {
  components: { UploadImgDialog },
  setup() {
    const Admin = ref(useAdminStore());
    const Hotel = ref(useHotelStore());
    return { Admin, Hotel };
  },
};
</script>
