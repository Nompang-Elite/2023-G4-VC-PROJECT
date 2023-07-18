import { defineStore } from "pinia";
export const useAuthStore = defineStore("Auth", {
  // Stated Data for the authentication
  state() {
    return {
      // Dialog trigger
      loginDialog: false,
      registerDialog: true,
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
    // Guest account login:
    guestLogin() {},
    // Guest account register:
    guestRegister() {},
    // Admin account login
    adminLogin() {},
    // Logout function
    logout() {},
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
