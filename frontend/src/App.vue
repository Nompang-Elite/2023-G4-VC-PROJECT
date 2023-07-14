<template>
  <v-app>
    <NavBar @search-input="search" />
    <!-- Login and register dialog container  -->
    <v-container v-if="!Auth.checkUser()">
      <login />
      <Register />
    </v-container>
    <v-main>
      <!--Router transition: https://www.youtube.com/watch?v=gAwKhi7Huhc -->
      <router-view v-slot="{ Component, route }">
        <Transition name="main" mode="out-in">
          <!-- Solution from : https://stackoverflow.com/questions/65553121/vue-3-transition-renders-non-element-root-node-that-cannot-be-animated -->
          <div :key="route.name">
            <component :is="Component" />
          </div>
        </Transition>
      </router-view>
    </v-main>

    <Footer />
  </v-app>
</template>

<script>
import NavBar from "@/components/Navigations/NavBar.vue";
import Footer from "@/components/Navigations/FooterNav.vue";
import Login from "@/components/Dialogs/LoginDialog.vue";
import Register from "@/components/Dialogs/RegisterDialog.vue";
import { useAuthStore } from "@/store/AuthStore";
import { useUserStore } from "@/store/UserStore";
// import api from "@/routes/api";
export default {
  setup() {
    const Auth = useAuthStore();
    const User = useUserStore();
    return { Auth, User };
  },
  components: { NavBar, Footer, Login, Register },
  data: () => ({}),
  methods: {
    search(e) {
      this.User.getSearchData(e);
      this.$router.push("/search");
    },
  },
};
</script>

<style scoped>
/* Setting the time for the transition */
.main-enter-active,
.main-leave-active {
  transition: 100ms ease all;
}

/* Transtion activity */
.main-enter-from,
.main-leave-to {
  opacity: 0;
  transform: translateY(65px);
}
</style>
