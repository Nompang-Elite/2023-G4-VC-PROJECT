import api from "@/routes/api";
import { defineStore } from "pinia";

export const useGuestStore = defineStore("Guest", {
  state() {
    return {
      results: [],
    };
  },
  actions: {
    getSearchData(input) {
      api.api_base
        .get("/hotel/search?s=" + input)
        .then((res) => {
          this.results = JSON.parse(JSON.stringify(res.data.data));
        })
        .catch((err) => console.log(err));
      // Return true if there is data
      return this.results.length > 1;
    },
  },
});
