import api from "@/routes/api";
import { defineStore } from "pinia";
export const useAuthStore = defineStore("Auth", {
  // Stated Data for the authentication
  state() {
    return {
      // Dialog trigger
      loginDialog: false,
      registerDialog: false,
      // User register info
      userRegisterInfo: {
        firstname: null,
        lastname: null,
        email: null,
        phone: null,
        password: null,
        password_confirmation: null,
        gender: null,
      },
    };
  },
  // Authentication action
  actions: {
    // Check if the user is guest
    checkIf(res, type) {
      return res.data.message === 200 && res.data.data.user_type === type;
    },
    // Authorize
    authorize(data) {
      // Set authorization header for the current session
      //  Source: https://stackoverflow.com/questions/58388884/set-bearer-token-after-login
      api.api_base.defaults.headers.common.Authorization =
        "Bearer " + data["access_token"];
      // Save token to cookie
      document.cookie = `access_token = ${data["access_token"]}`;
      // User data session
      sessionStorage.setItem("user_data", JSON.stringify(data));
      // User logged
      sessionStorage.setItem("user_logged", true);
      // Refresh page
      location.reload();
    },

    // Guest post request for auth
    guestAuthPostRequest(path, form) {
      api.api_base
        .post(path, form)
        .then((res) => {
          if (this.checkIf(res, "guest")) {
            this.authorize(res.data.data);
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // Guest account login:
    guestLogin(userData) {
      this.guestAuthPostRequest("/guest/login", userData);
    },

    // Guest account register:
    guestRegister(userData) {
      let user = userData;
      user.gender = user.gender == "Male" ? "m" : "f";
      this.guestAuthPostRequest("/guest/register", user);
    },

    // Admin account login
    adminLogin(userData) {
      api.api_base
        .post("/guest/login", userData)
        .then((res) => {
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // Logout function
    logout() {
      // Clear all session and cookie
      sessionStorage.clear();
      document.cookie = `access_token =`;
      // Refresh page
      location.reload();
    },

    // Check if there is user logged in
    userLogged() {
      return this.convertToArray(sessionStorage.getItem("user_logged"));
    },

    // Convert to array object
    convertToArray(t) {
      return JSON.parse(JSON.stringify(t));
    },
  },
});

//Solution source: https://stackoverflow.com/questions/3390396/how-can-i-check-for-undefined-in-javascript
