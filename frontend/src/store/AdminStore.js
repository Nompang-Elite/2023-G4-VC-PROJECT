import { defineStore } from "pinia";

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
        }
    }
})