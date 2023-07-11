import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
  state: () => {
    return {
      data: {},
    };
  },
  actions: {
    getData() {
      return this.data;
    },
  },
});
