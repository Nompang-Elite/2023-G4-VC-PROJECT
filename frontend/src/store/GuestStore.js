import api from "@/routes/api";
import { defineStore } from "pinia";

export const useGuestStore = defineStore("Guest", {
  state() {
    return {
      // Loading
      loading: false,
      // Reviews options
      review: {
        isPosted: false,
        isNotPosted: false,
        isValidReview: false,
        reviewDialog: false,
        reviewsInfo: {
          rate: 0,
          comment: null,
        },
      },
      hotelReviews: [],
      // Search Results,
      results: [],
      // Date
      date: {
        startDate: new Date(),
        endDate: new Date(),
      },
      bookingDialog: false,
      roomImgs: [],
      // Booking form
      bookingForm: {
        date_in: "",
        date_out: "",
        hotel_id: null,
        number_of_room: 1,
        room_type_id: null,
      },
      roomType: null,
      errorBookingDialog: false,
      loginAlert: false,
      bookingSuccess: false,
    };
  },
  actions: {
    //getCookie Code from: https://www.w3schools.com/js/js_cookies.asp
    getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(";");
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    },
    // Searching
    getSearchData(input) {
      api.api_base
        .get("/hotel/search?s=" + input)
        .then((res) => {
          this.results = JSON.parse(JSON.stringify(res.data.data));
        })
        .catch((err) => console.log(err.response.data.errors));
      // Return true if there is data
      return this.results.length > 1;
    },

    // Posting reviews
    postReview(id) {
      this.loading = true;
      let userReviewData = this.review.reviewsInfo;
      userReviewData["hotel_id"] = id;
      api.api_base
        .post("/guest/post/review", userReviewData, {
          headers: {
            Authorization: "Bearer" + this.getCookie("access_token"),
          },
        })
        .then(() => {
          this.getHotelReviews(id);
          this.loading = false;
          // Reset input
          this.review = {
            reviewDialog: false,
            reviewsInfo: {
              rate: 0,
              comment: null,
            },
          };
          // Display success message
          this.review.isPosted = true;
        })
        .catch((err) => {
          console.log(err);
        });
      console.log(userReviewData, id);
    },

    getHotelReviews(id) {
      api.api_base
        .post("/hotel/reviews", { hotel_id: id })
        .then((res) => {
          this.hotelReviews = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    isLoggedIn() {
      if (JSON.parse(sessionStorage.getItem("user_logged"))) {
        if (
          JSON.parse(sessionStorage.getItem("user_data")).user_type === "guest"
        ) {
          return true;
        }
        return false;
      }
      return false;
    },
    bookRoom() {
      if (sessionStorage.getItem("user_logged")) {
        this.bookingForm.date_in = this.date[0];
        this.bookingForm.date_out = this.date[1];
        // this.bookingForm.number_of_room = Number(
        //   this.bookingForm.number_of_room
        // );
        this.bookingForm.number_of_room = 1;
        if (this.bookingForm.date_in && this.bookingForm.date_out) {
          api.api_base
            .post("/guest/reserve/room", this.bookingForm)
            .then(() => {
              this.bookingSuccess = true;
              this.getRoomType(
                this.bookingForm.room_type_id,
                this.bookingForm.hotel_id
              );
              this.date = {
                startDate: new Date(),
                endDate: new Date(),
              };
              this.bookingForm = {
                hotel_id: null,
                number_of_room: 1,
                room_type_id: null,
              };
            })
            .catch((err) => {
              console.log(err.response);
              this.date = {
                startDate: new Date(),
                endDate: new Date(),
              };
              this.bookingForm = {
                hotel_id: null,
                number_of_room: 1,
                room_type_id: null,
              };
              this.bookingDialog = false;
              this.errorBookingDialog = true;
            });
        }
      } else if (!sessionStorage.getItem("user_logged")) this.loginAlert = true;
    },
    getRoomType(id, hotelId) {
      api.api_base
        .post("/hotel/room/type/detail", { id: id, hotel_id: hotelId })
        .then((result) => {
          this.roomType = result.data.data;
          console.log(result.data.data);
          this.bookingDialog = !this.bookingDialog;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
});
