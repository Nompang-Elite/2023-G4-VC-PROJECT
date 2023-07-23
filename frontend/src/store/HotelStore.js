import api from "@/routes/api";
import { defineStore } from "pinia";
export const useHotelStore = defineStore("Hotel", {
  state() {
    return {
      hotelInfo: {},
      hotelId: null,
    };
  },
  actions: {
    getHotelInfo() {
      api.api_base
        .post("/hotel/info", { hotel_id: this.hotelId })
        .then((result) => {
          console.log(result.data.data.name);
          this.hotelInfo = result.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
});
