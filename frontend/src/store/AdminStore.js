import { defineStore } from "pinia";
import api from "@/routes/api";

export const useAdminStore = defineStore("Admin", {
  state() {
    return {
      // Register information
      registerHotelDialog: false,
      showPassword: false,
      showPasswordConfirm: false,
      registerHotelForm: {
        firstname: null,
        lastname: null,
        email: null,
        phone: null,
        gender: null,
        password: null,
        password_confirmation: null,
        hotel_name: null,
        description: null,
        city: null,
        country: null,
        address: null,
        postal_code: null,
        hotel_phone: null,
        hotel_email: null,
      },
      errors: [],
      hotel_imgs: [],
    };
  },
  actions: {
    registerHotel(form) {
      if (form.gender === "Male") {
        form.gender = "M";
      } else if (form.gender === "Female") {
        form.gender = "F";
      }
      // console.log(form);
      api.api_base
        .post("/admin/hotels/register", form)
        .then((res) => {
          this.uploadHotelImg(res.data.data.hotel.id);
        })
        .catch((error) => {
          if (error.response) {
            console.log("Status:", error.response.status);
            console.log("Data:", error.response.data.errors);
          } else {
            console.log("Error:", error.message);
          }
        });
    },
    uploadHotelImg(id) {
      this.hotel_imgs.forEach((file) => {
        api.api_base
          .post(
            "/hotel/upload/image",
            { hotel_id: id, image: file },
            //Solution for multi form data:
            //  https://stackabuse.com/axios-multipart-form-data-sending-file-through-a-form-with-javascript/
            { headers: { "Content-Type": "multipart/form-data" } }
          )
          .then(() => {
            this.registerHotelDialog = false;
            this.uploadDialog = false;
            this.hotel_imgs = [];
            this.registerHotelForm = {
              firstname: null,
              lastname: null,
              email: null,
              phone: null,
              gender: null,
              password: null,
              password_confirmation: null,
              hotel_name: null,
              description: null,
              city: null,
              country: null,
              address: null,
              postal_code: null,
              hotel_phone: null,
              hotel_email: null,
            };
          })
          .catch((err) => {
            console.log(err);
          });
      });
    },
  },
});
