<template>
  <v-dialog v-model="Auth.registerDialog" width="auto" close-delay="0">
    <v-card width="28rem" rounded="xl" class="spacing-playground pa-4 mx-auto" theme="dark">
      <v-card-title class="text-h4"> Register </v-card-title>
      <v-card-subtitle>
        Already have an account?
        <span
          class=""
          @click="
            (Auth.registerDialog = !Auth.registerDialog),
              (Auth.loginDialog = !Auth.loginDialog)
          "
          >Log In</span
        >
      </v-card-subtitle>
      <v-card-text>
        <v-form ref="form" lazy-validate>
          <v-row>
            <v-col cols="14">
              <v-text-field
                rounded="xl"
                variant="outlined"
                density="compact"
                label="First Name"
                prepend-inner-icon="mdi-text"
                v-model="Auth.userRegisterInfo.firstname"
                :rules="rules.name"
                required
              >
              </v-text-field>
            </v-col>
            <v-col cols="14">
              <v-text-field
                rounded="xl"
                variant="outlined"
                density="compact"
                label="Last Name"
                prepend-inner-icon="mdi-text"
                v-model="Auth.userRegisterInfo.lastname"
                :rules="rules.name"
                required
              >
              </v-text-field>
            </v-col>
          </v-row>
          <v-text-field
            rounded="xl"
            variant="outlined"
            density="compact"
            prepend-inner-icon="mdi-email"
            label="Email"
            type="email"
            v-model="Auth.userRegisterInfo.email"
            :rules="rules.email"
            required
          >
          </v-text-field>
          <v-text-field
            rounded="xl"
            variant="outlined"
            density="compact"
            label="Phone"
            prepend-inner-icon="mdi-phone"
            v-model="Auth.userRegisterInfo.phone"
            type="number"
            :rules="rules.phone"
            required
          >
          </v-text-field>
          <v-row>
            <v-col cols="14">
              <v-text-field
                rounded="xl"
                variant="outlined"
                density="compact"
                prepend-inner-icon="mdi-lock"
                label="Password"
                type="password"
                v-model="Auth.userRegisterInfo.password"
                :rules="rules.password"
                required
              >
              </v-text-field>
            </v-col>
            <v-col cols="14">
              <v-text-field
                rounded="xl"
                variant="outlined"
                density="compact"
                prepend-inner-icon="mdi-lock-check"
                label="Confirm Password"
                type="password"
                v-model="Auth.userRegisterInfo.password_confirmation"
                :rules="rules.password_confirm"
                required
              >
              </v-text-field>
            </v-col>
          </v-row>
          <v-select
            :items="['Male', 'Female']"
            density="compact"
            variant="outlined"
            label="Gender"
            v-model="Auth.userRegisterInfo.gender"
            :rules="rules.gender"
            rounded="xl"
          ></v-select>
          <v-btn
            @click="Auth.guestRegister(Auth.userRegisterInfo)"
            block
            variant="outlined"
            height="3rem"
            color="info"
            rounded="xl"
          >
            Register
          </v-btn>
        </v-form>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>
<script>
import { useAuthStore } from "@/store/AuthStore";
import { reactive } from "vue";
export default {
  setup() {
    const Auth = reactive(useAuthStore());

    return { Auth };
  },
  data() {
    return {
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
        password_confirm: [
          (v) =>
            v == this.Auth.userRegisterInfo.password || "Password not match",
        ],
        gender: [(v) => v !== null || "Select your gender"],
      },
    };
  },
};
</script>
