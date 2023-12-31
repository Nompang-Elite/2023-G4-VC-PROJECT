import api from "@/routes/api";
import { defineStore } from "pinia";
export const useAuthStore = defineStore("Auth", {
  // Stated Data for the authentication
  state() {
    return {
      // Loading
      loading: false,
      // Views activate
      guestView: true,
      hotelView: false,
      adminView: false,
      adminLog: false,
      // Dialog trigger
      loginDialog: false,
      errorLoginDialog: false,
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
      // Delete after store in cookie
      delete data["access_token"];
      // User data session
      sessionStorage.setItem("user_data", JSON.stringify(data));
      // User logged
      data["user_type"] === "hotel_owner"
        ? sessionStorage.setItem("owner_logged", true)
        : sessionStorage.setItem("user_logged", true);
      // Refresh page
      location.reload();
    },

    // Guest post request for auth
    async guestAuthPostRequest(path, form) {
      this.loading = true;
      api.api_base
        .post(path, form)
        .then((res) => {
          if (this.checkIf(res, "guest") || this.checkIf(res, "hotel_owner")) {
            this.authorize(res.data.data);
            this.loading = false;
          }
        })
        .catch((err) => {
          this.loading = false;
          this.errorLoginDialog = true;
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
      this.loading = true;
      api.api_base
        .post("/admin/login", userData)
        .then((res) => {
          if (res.status == 200) {
            // ដកចេញពេលដើម្បី security
            sessionStorage.clear("adminSecret");
            sessionStorage.setItem("admin_logged", true);
            this.authorize(res.data.data);
            this.loading = false;
          }
        })
        .catch((err) => {
          this.loading = false;
          this.errorLoginDialog = true;
          console.log(err);
        });
    },

    // Logout function
    logout() {
      this.clearUserData();
      this.guestAuthPostRequest("/guest/logout");
      // Refresh page
      location.reload();
    },

    // Clear client side data
    clearUserData() {
      // Clear all session and cookie
      sessionStorage.clear();
      document.cookie = document.cookie = "access_token=; Max-Age=0";
      // Solution : https://stackoverflow.com/questions/2144386/how-to-delete-a-cookie
    },
    // Check if there is user logged in
    userLogged() {
      return this.convertToArray(sessionStorage.getItem("user_logged"));
    },

    // Convert to array object
    convertToArray(t) {
      return JSON.parse(JSON.stringify(t));
    },
    // Get logged user
    getUser() {
      return JSON.parse(sessionStorage.getItem("user_data"));
    },
  },
});

//Solution source: https://stackoverflow.com/questions/3390396/how-can-i-check-for-undefined-in-javascript
