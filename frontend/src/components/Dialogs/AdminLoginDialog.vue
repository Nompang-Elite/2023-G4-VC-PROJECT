<template>
  <v-main>
    <v-dialog v-model="adminLoginActive" close-delay="500" open-delay="500">
      <v-sheet width="350" class="mx-auto" rounded="xl">
        <v-card class="mx-auto pa-8" theme="dark">
          <v-card-text align="center" justify="center">
            <v-img
              src="https://o.remove.bg/downloads/b04d896c-7c3e-4719-94fb-4adb4a17249a/image-removebg-preview.png"
              width="100"
              class="mb-3"
              cover
            ></v-img>
            <h1>Admin</h1>
          </v-card-text>
          <v-form @submit.prevent="login">
            <v-text-field
              label="Email"
              v-model="form.email"
              variant="outlined"
              density="compact"
              rounded="xl"
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
            <v-btn
              class="mx-auto w-100 rounded-xl"
              type="submit"
              color="info"
              variant="outlined"
              @click.prevent="Auth.adminLogin(form)"
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
      loading: false,
      error: "",
    };
  },
  computed: {
    adminLoginActive() {
      if (JSON.parse(sessionStorage.getItem("adminSecret"))) {
        return true;
      }
      return false;
    },
  },
  methods: {
    login() {
      this.loading = true;
      // perform login logic here
      setTimeout(() => {
        this.loading = false;
      }, 3000);
    },
  },
  setup() {
    const Auth = reactive(useAuthStore());
    return { Auth };
  },
};
</script>
