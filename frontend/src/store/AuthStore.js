import api from "@/routes/api";
import { defineStore } from "pinia";
export const useAuthStore = defineStore("Auth", {
  // Stated Data for the authentication
  state() {
    return {
      loginDialog: false,
      registerDialog: false,
    };
  },
  // Authentication action
  actions: {
    login(form) {
      const user = JSON.parse(JSON.stringify(form));
      api.api_base
  
        .post("/v1/auth/login", user)
        .then((result) => {
          if(result.data) this.authorizeUser(result)
        })
        .catch((error) => {
          console.log(error);
        })
    },
    authorizeUser(res) {
      // Set authorization header for the current session
      //  Source: https://stackoverflow.com/questions/58388884/set-bearer-token-after-login
      api.api_base.defaults.headers.common.Authorization =
        "Bearer " + res.data["access_token"];
      // Save token to cookie
      document.cookie = `access_token = ${res.data["access_token"]}`;
      // User data session
      sessionStorage.setItem("user_data", JSON.stringify(res.data.user));
      // User logged
      sessionStorage.setItem("user_logged", true);
      // Refresh page
      location.reload();
    },
  },
});
