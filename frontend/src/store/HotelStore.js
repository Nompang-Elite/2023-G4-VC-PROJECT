import api from "@/routes/api";
import { defineStore } from "pinia";
export const useHotelStore = defineStore("Hotel", {
  state() {
    return {
      uploadDialog: false,
      hotelInfo: {},
      hotelImgs: [],
      hotelImg: null,
      imgFiles: [],
      imgDecoder: "data:image/*;base64,",
      hotelId: null,
    };
  },
  actions: {
    getHotelInfo() {
      api.api_base
        .post("/hotel/info", { hotel_id: this.hotelId })
        .then((result) => {
          this.hotelInfo = result.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getHotelImage() {
      api.api_base
        .post("/hotel/get/images", { hotel_id: this.hotelId })
        .then((res) => {
          this.hotelImgs = res.data.data;
          this.hotelImg = this.hotelImgs[0]["image_hash"];
        })
        .catch((err) => {
          console.log(err);
        });
    },
    uploadHotelImg() {
      this.imgFiles.forEach((file) => {
        console.log({ hotel_id: this.hotelId, image: file }, file.type);
        api.api_base
          .post(
            "/hotel/upload/image",
            { hotel_id: this.hotelId, image: file },
            //Solution for multi form data:
            //  https://stackabuse.com/axios-multipart-form-data-sending-file-through-a-form-with-javascript/
            { headers: { "Content-Type": "multipart/form-data" } }
          )
          .then(() => {
            this.uploadDialog = false;
            this.imgFiles = [];
          })
          .catch((err) => {
            console.log(err);
          });
      });
    },
  },
});
