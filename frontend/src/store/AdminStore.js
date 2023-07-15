import { defineStore } from "pinia";

export const useAdminStore = defineStore("Admin", {
  state() {
    return {
      adminInfo: null,
      isLog: false,
    };
  },
  actions: {
    // Get the token key from cookie:
    getToken() {
      return document.cookie.accessToken;
    },
    // Set token key to cookie:
    setToken(key) {
      document.cookie.accessToken = "Bearer " + key;
    },
  },
});
