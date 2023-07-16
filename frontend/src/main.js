import { createApp } from "vue";
import App from "./App.vue";
import vuetify from "./plugins/vuetify";
import { loadFonts } from "./plugins/webfontloader";
import routes from "./routes";
import { createPinia } from "pinia";

loadFonts();

createApp(App).use(createPinia()).use(routes).use(vuetify).mount("#app");
