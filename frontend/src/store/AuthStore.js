import api from "@/routes/api";
import { defineStore } from "pinia";
export const useAuthStore = defineStore("Auth", {
  // Stated Data for the authentication
  state() {
    return {
      exist: false,
      login: false,
      register: false,
      // Register data structure
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
    };
  },
  // Authentication action
  actions: {
    registerUser() {
      const usrObj = JSON.parse(JSON.stringify(this.user));
      usrObj.gender == "Male" ? (usrObj.gender = "m") : (usrObj.gender = "f");
      api.api_base
        .post("/v1/auth/register", usrObj)
        .then((result) => {
          // Check for the result and authorize
          if (result.data) this.authorizeUser(result);
        })
        .catch((err) => {
          if (
            err.response.data.errors.email ==
            "The email has already been taken."
          ) {
            this.exist = true;
          }
          console.log(err);
        });
    },

    loginUser(form) {
      const usrObj = JSON.parse(JSON.stringify(form));
      api.api_base
        // get link from backend using method Post to Login
        .post("/v1/auth/login", usrObj)
        .then((result) => {
          // Check for the result and authorize
          if (result.data) this.authorizeUser(result);
        })
        // console.log message error
        .catch((error) => {
          console.log(error);
        });
    },

    authorizeUser(res) {
      // Set authorization header for the current session
      //  Source: https://stackoverflow.com/questions/58388884/set-bearer-token-after-login
      api.api_base.defaults.headers.common.Authorization =
        "Bearer " + res.data["access_token"];
      // Save token to cookie
      document.cookie = `access_token = ${res.data["access_token"]}`;
      // User data session
      sessionStorage.setItem("user_data", JSON.stringify(res.data.user));
      // User logged
      sessionStorage.setItem("user_logged", true);
      // Refresh page
      location.reload();
    },

    checkUser() {
      return sessionStorage.getItem("user_logged");
    },

    logout() {
      // Clear all session and cookie
      sessionStorage.clear();
      document.cookie = `access_token =`;

      // Refresh page
      location.reload();
    },

    getUserData() {
      // Check if user login, then return user data
      return sessionStorage.getItem("user_logged") !== true
        ? // Parse Json to Obj
          JSON.parse(sessionStorage.getItem("user_data"))
        : null;
    },
  },
});
