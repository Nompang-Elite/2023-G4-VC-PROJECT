<template>
  <v-main>
    <v-dialog v-model="Auth.loginDialog" close-delay="500" open-delay="500">
      <v-sheet width="350" class="mx-auto" rounded="xl">
        <v-card class="mx-auto pa-8" theme="dark">
          <v-card-text align="center" justify="center">
            <v-img
              src="https://o.remove.bg/downloads/b04d896c-7c3e-4719-94fb-4adb4a17249a/image-removebg-preview.png"
              width="100"
              class="mb-3"
              cover
            ></v-img>
            <h1>Login</h1>
          </v-card-text>
          <v-form>
            <v-text-field
              label="Email"
              v-model="form.email"
              variant="outlined"
              density="compact"
              rounded="xl"
              :rules="emailRule"
            ></v-text-field>
            <v-text-field
              label="Password"
              v-model="form.password"
              variant="outlined"
              density="compact"
              rounded="xl"
              type="password"
              :error-messages="error"
            ></v-text-field>
            <v-card-subtitle class="mb-5">
              Don't have an account?
              <span
                class=""
                @click="
                  (Auth.registerDialog = !Auth.registerDialog),
                    (Auth.loginDialog = !Auth.loginDialog)
                "
                >Register</span
              >
            </v-card-subtitle>
            <v-btn
              class="mx-auto w-100 rounded-xl"
              type="submit"
              variant="outlined"
              color="info"
              @click.prevent="Auth.guestLogin(form)"
              :loading="Auth.loading"
              >Login
            </v-btn>
          </v-form>
        </v-card>
      </v-sheet>
    </v-dialog>
    <v-dialog width="auto" v-model="Auth.errorLoginDialog">
      <v-card color="red">
        <v-card-text>
          <v-card-title class="text-center">
            <v-icon icon="mdi-alert"></v-icon>
          </v-card-title>
          Password or Email is incorrect!
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-main>
</template>
<script>
import { useAuthStore } from "@/store/AuthStore";
import { reactive } from "vue";
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      emailRule: [
        // Regex pattern: https://stackoverflow.com/questions/46155/how-can-i-validate-an-email-address-in-javascript
        (v) =>
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            v
          ) || "Email required",
      ],
      loading: false,
      error: "",
    };
  },
  methods: {},
  setup() {
    const Auth = reactive(useAuthStore());
    return { Auth };
  },
};
</script>
