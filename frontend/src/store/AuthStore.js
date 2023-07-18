import { defineStore } from "pinia";
export const useAuthStore = defineStore("Auth", {
  // Stated Data for the authentication
  state() {
    return {
      loginDialog: false,
      registerDialog: false,
    };
  },
  // Authentication action
  actions: {
    // Guest account login:
    guestLogin() {},
    // Admin account login
    adminLogin() {},
    // Logout function
    logout() {},
  },
});
