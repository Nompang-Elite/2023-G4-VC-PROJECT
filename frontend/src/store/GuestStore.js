import api from "@/routes/api";
import { defineStore } from "pinia";

export const useGuestStore = defineStore("Guest", {
  state() {
    return {
      // Reviews options
      review: {
        isPosted: false,
        isNotPosted: false,
        isValidReview: false,
        reviewDialog: false,
        reviewsInfo: {
          ratingVal: 0,
          comment: null,
        },
      },
    };
  },
  actions: {
    // Searching
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

    // Posting reviews
    postReview() {
      const userReviewData = this.review.reviewsInfo;
      return userReviewData;
    },
  },
});
