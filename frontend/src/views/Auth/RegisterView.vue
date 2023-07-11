<template>
  <v-card max-width="28rem" rounded="lg" class="mx-auto mt-15">
    <v-card-title> Register </v-card-title>
    <v-card-subtitle>
      Already have an account? <a href="/login">Sign in</a>
    </v-card-subtitle>
    <v-card-text>
      <v-form ref="form" lazy-validate>
        <v-row>
          <v-col cols="14">
            <v-text-field
              variant="solo"
              density="compact"
              label="First Name"
              prepend-inner-icon="mdi-text"
              v-model="user.firstname"
              :rules="rules.name"
              required
            >
            </v-text-field>
          </v-col>

          <v-col cols="14">
            <v-text-field
              variant="solo"
              density="compact"
              label="Last Name"
              prepend-inner-icon="mdi-text"
              v-model="user.lastname"
              :rules="rules.name"
              required
            >
            </v-text-field>
          </v-col>
        </v-row>
        <v-text-field
          variant="solo"
          density="compact"
          label="Phone"
          prepend-inner-icon="mdi-phone"
          v-model="user.phone"
          type="number"
          :rules="rules.phone"
          required
        >
        </v-text-field>
        <v-text-field
          variant="solo"
          density="compact"
          prepend-inner-icon="mdi-email"
          label="Email"
          type="email"
          v-model="user.email"
          :rules="rules.email"
          required
        >
        </v-text-field>
        <p v-if="exist" class="font-weight-light">Email already exist</p>
        <v-row>
          <v-col cols="14">
            <v-text-field
              variant="solo"
              density="compact"
              prepend-inner-icon="mdi-lock"
              label="Password"
              type="password"
              v-model="user.password"
              :rules="rules.password"
              required
            >
            </v-text-field>
          </v-col>
          <v-col cols="14">
            <v-text-field
              variant="solo"
              density="compact"
              prepend-inner-icon="mdi-lock-check"
              label="Confirm Password"
              type="password"
              v-model="user.password_confirmation"
              :rules="rules.passwordConfirm"
              required
            >
            </v-text-field>
          </v-col>
        </v-row>
        <v-select
          :items="['Male', 'Female']"
          density="compact"
          variant="solo"
          label="Gender"
          v-model="user.gender"
          :rules="rules.gender"
        ></v-select>

        <v-btn
          @click="submitData"
          block
          variant="elevated"
          height="4rem"
          color="success"
        >
          Register
        </v-btn>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script>
import api from "@/router/api";
import { useUserStore } from "@/store/UserStore";

export default {
  data() {
    return {
      exist: false,
      user: {
        firstname: null,
        lastname: null,
        phone: null,
        email: null,
        password: null,
        password_confirmation: null,
        gender: null,
        current_location: null,
      },
      rules: {
        email: [
          // Regex pattern: https://stackoverflow.com/questions/46155/how-can-i-validate-an-email-address-in-javascript
          (v) =>
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
              v
            ) || "Email required",
        ],
        phone: [(v) => v !== null || "Phone required"],
        name: [(v) => v != null] || "Required",
        password: [
          (v) =>
            /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(v) ||
            "Password must contain at least lowercase letter, one number, a special character and one uppercase let",
        ],
        passwordConfirm: [
          (v) => v == this.user.password || "Password not match",
        ],
        gender: [(v) => v !== null || "Select your gender"],
      },
    };
  },

  methods: {
    submitData() {
      const usrObj = JSON.parse(JSON.stringify(this.user));
      usrObj.gender == "Male" ? (usrObj.gender = "m") : (usrObj.gender = "f");
      api.api_base
        .post("/v1/auth/register", usrObj)
        .then((result) => {
          console.log(result.data);
          this.userStore.data = result.data;
          this.$router.push("/");
        })
        .catch((err) => {
          console.log(usrObj);
          console.log(err.response.data);
          if (
            err.response.data.errors.email ==
            "The email has already been taken."
          ) {
            this.exist = true;
          }
        });
    },
  },

  setup() {
    let userStore = useUserStore();
    return { userStore };
  },
};
</script>
