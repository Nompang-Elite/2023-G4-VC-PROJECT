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
            ></v-text-field>
            <v-text-field
              rounded="pill"
              density="compact"
              variant="solo"
              class="mx-2"
              label="Last Name"
            ></v-text-field>
          </v-card-text>
          <v-text-field
            density="compact"
            variant="solo"
            rounded="pill"
            class="mx-11"
            label="Phone Number"
          ></v-text-field>
          <v-text-field
            density="compact"
            variant="solo"
            rounded="pill"
            class="mx-11 mt-4"
            label="Email"
          ></v-text-field>
          <v-card-text class="d-flex mx-5">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="solo"
              class="mx-2"
              label="Password"
            ></v-text-field>
            <v-text-field
              rounded="pill"
              density="compact"
              variant="solo"
              class="mx-2"
              label="Confirm Password"
            ></v-text-field>
          </v-card-text>
          <v-text-field
            density="compact"
            variant="solo"
            rounded="pill"
            class="mx-11"
            label="Gender"
          ></v-text-field>
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
            ></v-text-field>
            <v-text-field
              rounded="pill"
              density="compact"
              variant="solo"
              class="mx-2"
              label="Postal Code"
            ></v-text-field>
          </v-card-text>
          <v-text-field
            density="compact"
            variant="solo"
            rounded="pill"
            class="mx-11"
            label="Phone Number"
          ></v-text-field>
          <v-text-field
            density="compact"
            variant="solo"
            rounded="pill"
            class="mx-11 mt-4"
            label="Email"
          ></v-text-field>
          <v-card-text class="d-flex mx-5">
            <v-text-field
              rounded="pill"
              density="compact"
              variant="solo"
              class="mx-2"
              label="City"
            ></v-text-field>
            <v-text-field
            rounded="pill"
            density="compact"
            variant="solo"
            class="mx-2"
            label="Country"
            ></v-text-field>
          </v-card-text>
          <v-text-field
         density="compact"
         variant="solo"
         rounded="pill"
         class="mx-11"
         label="Address"
          ></v-text-field>
            <v-textarea
            class="mx-11"
            label="Description"
            ></v-textarea>
        </v-card>
          <v-btn class="bg-info rounded-pill mx-10 p-5" width="535">Register</v-btn>
      </v-sheet>
  </v-dialog>
</template>
<script>
export default {
  data() {
    return {
      dialog: false,
    };
  },
};
</script>
