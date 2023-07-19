import { createApp } from "vue";
import App from "./App.vue";
import vuetify from "./plugins/vuetify";
import { loadFonts } from "./plugins/webfontloader";
import routes from "./routes";
import Pinia from "./store/PiniaMain";

loadFonts();

createApp(App).use(Pinia).use(routes).use(vuetify).mount("#app");
