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
            <router-link to="/register" >Sing Up</router-link>
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
  // Import axios to use for fetching data from database
  import axios from "axios";
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
        axios
        // get link from backend using method Post to Login 
          .post("http://localhost:8000/api/auth/login", this.form)
          .then((response) => {
            // Set condition if data is not error login to home page
            if (!response.data.error) {
              this.$router.push({name: "Home"})
            } else {
              this.error = "Inccorect email or password!";
              this.form.email = "";
              this.form.password = "";
            }
          })
          // console.log message error
          .catch((error) => {
            console.log(error);
          });
      },
    },
  };
  </script>
  