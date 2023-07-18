<template>
  <v-dialog width="40rem" close-delay="2000" v-model="Auth.registerDialog">
    <v-card rounded="xl">
      <v-card-text>
        <!-- Email section -->
        <v-row>
          <v-col cols="6">
            <v-text-field label="Email" variant="solo" rounded="xl">
            </v-text-field>
          </v-col>
          <v-col cols="6">
            <v-text-field label="Confirm Email" variant="solo" rounded="xl">
            </v-text-field>
          </v-col>
        </v-row>
        <!-- Password section -->
        <v-row>
          <v-col cols="6">
            <v-text-field label="Password" variant="solo" rounded="xl">
            </v-text-field>
          </v-col>
          <v-col cols="6">
            <v-text-field label="Confirm Password" variant="solo" rounded="xl">
            </v-text-field>
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>
<script>
import { useAuthStore } from "@/store/AuthStore";
import { toRefs } from "vue";
export default {
  setup() {
    const Auth = toRefs(useAuthStore());

    return { Auth };
  },
};
</script>
