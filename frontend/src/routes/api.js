import axios from "axios";
//getCookie Code from: https://www.w3schools.com/js/js_cookies.asp
function getCookie(cname) {
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
}
const api = axios.create({ baseURL: process.env.VUE_APP_API_URL });

if (getCookie("access_token") !== "") {
  api.defaults.headers.common.Authorization =
    "Bearer" + getCookie("access_token");
}

export default {
  api_base: api,
};
