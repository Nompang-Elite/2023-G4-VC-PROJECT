import api from "@/routes/api";
import { defineStore } from "pinia";
export const useHotelStore = defineStore("Hotel", {
  state() {
    return {
      addRoomDialog: false,
      uploadDialog: false,
      hotelInfo: {},
      hotelImgs: [],
      hotelImg: null,
      imgFiles: [],
      imgDecoder: "data:image/*;base64,",
      hotelId: null,
      //Rules validation from: https://stackoverflow.com/questions/60108629/how-can-i-validate-the-maximum-file-size-is-2-mb-per-file-for-multiple-files-v
      imgRules: [
        (files) =>
          !files ||
          // Using some() function to test each files, while form is multi-file
          !files.some((file) => file.size > 2_097_152) ||
          "Images size should be less than 2 MB!",
      ],
      // Hotel rooms
      rooms: null,
      roomType: [],
      addRoomMsgDialog: false,
      addRoomMsgErrDialog: false,
      addRoomForm: {
        name: "",
        number: "",
        room_type_id: null,
      },
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
    // Get Rooms
    getRooms() {
      api.api_base.get("/hotel/rooms/all").then((res) => {
        this.rooms = res.data.data;
      });
    },
    //Function Filter status rooms
    filterRooms(status) {
      console.log(status);
      api.api_base
        .get("/hotel/rooms/filter/" + status)
        .then((res) => {
          this.rooms = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // Add room to hotel
    addRoom() {
      api.api_base
        .post("/hotel/room/add", this.addRoomForm)
        .then(() => {
          this.addRoomMsgDialog = true;
          this.addRoomDialog = !this.addRoomMsgDialog;
          this.addRoomForm = {
            name: "",
            number: "",
            room_type_id: null,
          };
        })
        .catch((err) => {
          this.addRoomMsgErrDialog = true;
          console.log(err);
        });
    },
    // Get roomtype
    getRoomType() {
      api.api_base
        .post("/hotel/room/type")
        .then((res) => {
          this.roomType = res.data.data;
          this.addRoomDialog = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
});
