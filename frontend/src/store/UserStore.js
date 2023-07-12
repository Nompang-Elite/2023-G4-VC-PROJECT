import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
  state: () => {
    return {
      data: {},
      loggedIn: sessionStorage.getItem("user") !== null,
      accessToken: document.cookie.access_token,
    };
  },
  getters: {},
  actions: {
    getData() {
      return this.data;
    },

    logOut() {
      sessionStorage.removeItem("user");
      location.reload();
    },
  },
});
