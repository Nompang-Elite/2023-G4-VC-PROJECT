<!-- // code from vuetify// -->
<template>
  <v-sheet width="400" class="mx-auto mt-15">
    <v-card class="spacing-playground pa-6 rounded-lg" fluid>
      <v-card-item align="center">
        <v-img
          src="https://publicdomainvectors.org/tn_img/abstract-user-flat-4.webp"
          width="35%"
        ></v-img>
        <h1 align="center" justify="center" class="mb-6">Sign In</h1>
      </v-card-item>
      <v-form fast-fail @submit.prevent>
        <v-text-field
          v-model="form.email"
          label="Email"
          variant="solo"
          density="compact"
        ></v-text-field>
        <v-text-field
          v-model="form.password"
          label="Password"
          type="password"
          variant="solo"
          density="compact"
          :error-messages="error"
        ></v-text-field>
        <v-card-subtitle class="my-1 mb-4" style="margin-top: -20px">
          Don't have account?
          <router-link to="/register">Sing Up</router-link>
        </v-card-subtitle>
        <v-btn type="submit" block class="mt-0" @click="login" color="blue"
          >Login</v-btn
        >
      </v-form>
    </v-card>
  </v-sheet>
</template>
<!----------------  ------------------->
<script>
import api from "@/router/api";
import { useUserStore } from "@/store/UserStore";
// Import axios to use for fetching data from database
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      error: "",
    };
  },
  methods: {
    login() {
      const usrObj = JSON.parse(JSON.stringify(this.form));
      api.api_base
        // get link from backend using method Post to Login
        .post("/v1/auth/login", usrObj)
        .then((result) => {
          // Set authorization header for the current session
          //  Source: https://stackoverflow.com/questions/58388884/set-bearer-token-after-login
          api.api_base.defaults.headers.common.Authorization =
            "Bearer " + result.data["access_token"];

          document.cookie = `access_token = ${result.data["access_token"]}`;
          // Store user data
          this.userStore.data = result.data;
          // This line fix the user check condition in realtime
          this.userStore.loggedIn = true;
          // User session
          sessionStorage.setItem("user", JSON.stringify(result.data.user));
          // Redirect to home page
          this.$router.push("/");
        })
        // console.log message error
        .catch((error) => {
          console.log(error);
        });
    },
  },
  setup() {
    let userStore = useUserStore();
    return { userStore };
  },
};
</script>
