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
        hotel_imgs: null,
      },
      errors: [],
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
        .then(() => {
          this.Admin.registerHotelForm = {
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
            hotel_imgs: [],
          };
          this.Admin.registerHotelDialog = false;
        })
        .catch((error) => {
          if (error.response) {
            console.log("Status:", error.response.status);
            console.log("Data:", error.response.data.errors);
            alert("Register failed please try again!");
          } else {
            console.log("Error:", error.message);
          }
        });
    },
  },
});
