<template>
  <v-dialog v-model="dialog" width="700">
    <template v-slot:activator="{ props }">
      <v-btn color="primary" v-bind="props"> Open Dialog </v-btn>
    </template>
    <v-sheet class="pa-10 mx-auto">
      <h1>Register Hotel</h1>
      <v-card flat>
        <v-card-title>Owner Info</v-card-title>
        <v-card-text class="d-flex mx-5 mt-5">
          <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="First Name"
            v-model="registerHotelForm.firstname"
          ></v-text-field>
          <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="Last Name"
            v-model="registerHotelForm.lastname"
          ></v-text-field>
        </v-card-text>
        <v-text-field
          density="compact"
          variant="solo"
          rounded="pill"
          class="mx-11"
          label="Phone Number"
          v-model="registerHotelForm.phone"
        ></v-text-field>
        <v-text-field
          density="compact"
          variant="solo"
          rounded="pill"
          class="mx-11 mt-4"
          label="Email"
          v-model="registerHotelForm.email"
        ></v-text-field>
        <v-card-text class="d-flex mx-5">
          <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            v-model="registerHotelForm.password"
            label="Password"
            type="password"
          ></v-text-field>
          <v-text-field
            type="password"
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="Confirm Password"
            v-model="registerHotelForm.password_confirmation"
          ></v-text-field>
        </v-card-text>
        <v-select
          density="compact"
          rounded="pill"
          v-model="registerHotelForm.gender"
          class="mx-11"
          placeholder="Gender"
          :items="['Male', 'Female']"
          variant="solo-filled"
        ></v-select>
      </v-card>
      <v-card flat>
        <v-card-title>Hotel Info</v-card-title>
        <v-card-text class="d-flex mx-5 mt-5">
          <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="Hotel Name"
            v-model="registerHotelForm.hotel_name"
          ></v-text-field>
          <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="Postal Code"
            v-model="registerHotelForm.postal_code"
          ></v-text-field>
        </v-card-text>
        <v-text-field
          density="compact"
          variant="solo"
          rounded="pill"
          class="mx-11"
          label="Phone Number"
          v-model="registerHotelForm.hotel_phone"
        ></v-text-field>
        <v-text-field
          density="compact"
          variant="solo"
          rounded="pill"
          class="mx-11 mt-4"
          label="Email"
          v-model="registerHotelForm.hotel_email"
        ></v-text-field>
        <v-card-text class="d-flex mx-5">
          <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="City"
            v-model="registerHotelForm.city"
          ></v-text-field>
          <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="Country"
            v-model="registerHotelForm.country"
          ></v-text-field>
        </v-card-text>
        <v-text-field
          density="compact"
          variant="solo"
          rounded="pill"
          class="mx-11"
          label="Address"
          v-model="registerHotelForm.address"
        ></v-text-field>
        <v-textarea
          class="mx-11"
          v-model="registerHotelForm.description"
          label="Description"
        ></v-textarea>
      </v-card>
      <v-btn
        class="bg-info rounded-pill mx-10 p-5"
        width="535"
        @click.prevent="registerHotel(registerHotelForm)"
        >Register</v-btn
      >
    </v-sheet>
  </v-dialog>
</template>
<script>
import api from "@/routes/api";

export default {
  data() {
    return {
      dialog: false,
      showPassword: false,
      showPasswordConfirm: false,
      registerHotelForm: {
        firstname: null,
        lastname: null,
        email: null,
        phone: null,
        gender: null,
        password: null,
        password_confirmation: null,
        hotel_name: null,
        description: null,
        city: null,
        country: null,
        address: null,
        postal_code: null,
        hotel_phone: null,
        hotel_email: null,
      },
    };
  },

  methods: {
    registerHotel(form) {
      if (form.gender === "Male") {
        form.gender = "m";
      } else if (form.gender === "Female") {
        form.gender = "f";
      }
      console.log(form);
      api.api_base
        .post("/hotels/register", form)
        .then(() => {
          console.log("Wotking!");
        })
        .catch((error) => {
          if (error.response) {
            console.log("Status:", error.response.status);
            console.log("Data:", error.response.data);
          } else {
            console.log("Error:", error.message);
          }
        });
    },
  },
};
</script>
