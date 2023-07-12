<template>
  <v-app>
    <nav-bar />
    <v-main>
      <router-view> </router-view>
    </v-main>
    <FooterApp />
  </v-app>
</template>

<script>
import NavBar from "./components/nav/NavBar.vue";
import FooterApp from "./components/footer/FooterApp.vue";
export default {
  name: "App",
  components: { NavBar,FooterApp },
};
</script>
