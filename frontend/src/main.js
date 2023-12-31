import { createApp } from "vue";
import App from "./App.vue";
import vuetify from "./plugins/vuetify";
import { loadFonts } from "./plugins/webfontloader";
import routes from "./routes";
import Pinia from "./store/PiniaMain";
import titleMixin from "./titleMixin";

loadFonts();

createApp(App)
  .mixin(titleMixin)
  .use(Pinia)
  .use(routes)
  .use(vuetify)
  .mount("#app");

/**
 * Shortcut key plugin for vue
 * https://github.com/fgr-araujo/vue-shortkey
 * */
