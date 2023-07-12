<template>
  <!--Dialog Docs: https://vuetifyjs.com/en/api/v-dialog/ -->
  <v-dialog v-model="login" width="auto" close-delay="0">
    <v-sheet width="380" class="mx-auto" rounded="xl">
      <v-card class="spacing-playground pa-8 rounded-xl" fluid>
        <v-card-item align="center">
          <v-img
            src="https://publicdomainvectors.org/tn_img/abstract-user-flat-4.webp"
            width="35%"
          ></v-img>
          <h1 align="center" justify="center" class="mb-6">Login</h1>
        </v-card-item>
        <v-form fast-fail @submit.prevent>
          <v-text-field
            rounded="xl"
            v-model="form.email"
            label="Email"
            variant="solo"
            density="compact"
          ></v-text-field>
          <v-text-field
            rounded="xl"
            v-model="form.password"
            label="Password"
            type="password"
            variant="solo"
            density="compact"
            :error-messages="error"
          ></v-text-field>
          <v-card-subtitle class="my-1 mb-4" style="margin-top: -20px">
            Don't have account?
            <span class="" @click="(register = !register), (login = !login)"
              >Register</span
            >
          </v-card-subtitle>
          <v-btn
            type="submit"
            block
            class="mt-0"
            @click="loginUser(form)"
            color="blue"
            rounded="xl"
            height="3rem"
            >Login</v-btn
          >
        </v-form>
      </v-card>
    </v-sheet>
  </v-dialog>
</template>

<script>
import { useAuthStore } from "@/store/AuthStore";
import { toRefs } from "vue";

export default {
  data() {
    return {
      // Login data structure
      formDialog: false,
      form: {
        email: "",
        password: "",
      },
      error: "",
    };
  },

  setup() {
    const Auth = useAuthStore();
    return toRefs(Auth);
  },
};
</script>
