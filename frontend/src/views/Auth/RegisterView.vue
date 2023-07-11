<template>
  <v-card
    max-width="26rem"
    class="mx-auto mt-15 spacing-playground pa-2"
    elevation="5"
  >
    <v-card-title class="font-weight-bold"> Register </v-card-title>
    <v-card-subtitle>
      Already have an account? <a href="/login">Sign In</a>
    </v-card-subtitle>
    <v-card-text>
      <v-form ref="form" lazy-validation>
        <v-row>
          <v-col cols="20">
            <v-text-field
              variant="solo"
              label="First name"
              type="text"
              append-inner-icon="mdi-text"
              density="compact"
              :rules="firstnameRules"
              v-model="user.firstname"
            >
            </v-text-field>
          </v-col>
          <v-col cols="20">
            <v-text-field
              variant="solo"
              label="Last name"
              type="text"
              append-inner-icon="mdi-text"
              density="compact"
              :rules="lastnameRules"
              v-model="user.lastname"
            >
            </v-text-field>
          </v-col>
        </v-row>
        <v-text-field
          variant="solo"
          label="Email"
          type="email"
          append-inner-icon="mdi-email"
          density="compact"
          :rules="emailRules"
          v-model="user.email"
        >
        </v-text-field>
        <v-text-field
          variant="solo"
          label="Phone"
          type="text"
          append-inner-icon="mdi-phone"
          density="compact"
          v-model="user.phone"
        >
        </v-text-field>
        <v-row>
          <v-col cols="20">
            <v-text-field
              variant="solo"
              label="Password"
              type="text"
              append-inner-icon="mdi-lock-outline"
              density="compact"
              v-model="user.password"
            >
            </v-text-field>
          </v-col>
          <v-col cols="20">
            <v-text-field
              variant="solo"
              label="Confirm Password"
              type="text"
              append-inner-icon="mdi-lock-check-outline"
              density="compact"
              v-model="user.password_confirmation"
            >
            </v-text-field>
          </v-col>
        </v-row>

        <v-select
          label="Gender"
          :items="['Male', 'Female']"
          variant="solo"
          density="compact"
          append-inner-icon="mdi-account"
          v-model="user.gender"
        ></v-select>

        <v-btn
          variant="elevated"
          height="3.6rem"
          color="gray"
          block
          @click="submitForm"
        >
          Register
        </v-btn>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script>
import { useUserStore } from "@/store/UserStore";
import api from "@/router/api";
import { toRefs } from "vue";
export default {
  setup() {
    const userStore = useUserStore();
    return toRefs(userStore);
  },
  data() {
    return {
      user: {
        firstname: null,
        lastname: null,
        email: null,
        phone: null,
        gender: null,
        password: null,
        password_confirmation: null,
        current_location: "0.0.0.0",
      },
      emailRules: [
        (v) => !!v || "E-mail is required",
        (v) =>
          /^(([^<>()[\]\\.,;:\s@']+(\.[^<>()\\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            v
          ) || "E-mail must be valid",
      ],
      passwordRules: [
        (v) => !!v || "Password is required",
        (v) =>
          /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(v) ||
          "Password must contain at least lowercase letter, one number, a special character and one uppercase letter",
      ],
      lastnameRules: [
        (v) => !!v || "First name is required",
        (v) => (v && v.length <= 10) || "Name must be less than 10 characters",
      ],
      firstnameRules: [
        (v) => !!v || "Last name is required",
        (v) => (v && v.length <= 10) || "Name must be less than 10 characters",
      ],
    };
  },
  methods: {
    submitForm() {
      // refered form
      this.$refs.form.validate();
      if (this.$refs.form.validate()) {
        // Parsing Proxy array to normal array
        const usrObj = JSON.parse(JSON.stringify(this.user));
        // convert to single char for gender
        usrObj["gender"] == "Male"
          ? (usrObj["gender"] = "m")
          : (usrObj["gender"] = "f");
        // using defined axios
        api.api_base
          .post("/api/v1/auth/register", usrObj, {
            // Setting content type to json
            headers: {
              "Content-Type": "application/json",
            },
          })
          .then((result) => {
            if (result.data.status == "successfully") {
              console.log(result.data);
              // Set authorization header for the current session
              //  Source: https://stackoverflow.com/questions/58388884/set-bearer-token-after-login
              api.api_base.defaults.headers.common.Authorization =
                "Bearer " + result.data["access_token"];
              // Store user data
              this.data = result.data;
              // Route to home page
              this.$router.push("/");
            }
          })
          .catch((err) => {
            console.log(err.response.data.errors);
          });
      }
    },
  },
};
</script>
