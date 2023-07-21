import api from "@/routes/api";
import { defineStore } from "pinia";

export const useHotelStore = defineStore("Hotel", {
  state() {
    return {
      rooms: [],
    };
  },
  actions: {
    getCookie(cookieName) {
      // Solution : https://www.w3schools.blog/get-cookie-by-name-javascript-js
      let cookie = {};
      document.cookie.split(";").forEach(function (el) {
        let [key, value] = el.split("=");
        cookie[key.trim()] = value;
      });
      return cookie[cookieName];
    },
    getRooms() {
      api.api_base
        .get("/hotel/rooms", {
          headers: {
            Authorization: `Bearer ${this.getCookie("access_token")}`,
          },
        })
        .then((res) => {
          console.log(res.data.data);
          this.rooms = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
      return this.rooms.length != 0;
    },

    filterStatus(type) {
      return this.rooms.filter((room) => room.status === type);
    },

    async getOccupied() {
      await this.getRooms();
      this.rooms = this.filterStatus("occupied");
    },
    getUnoccupied() {
      this.rooms = this.filterStatus("unoccupied");
    },
  },
});
