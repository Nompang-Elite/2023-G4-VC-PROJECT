import { defineStore } from "pinia";
export const useHotelStore = defineStore("Auth", {
  state() {
    return {
      hotelInfo: null,
    };
  },
  actions: {
    getHotelInfo() {},
  },
});
