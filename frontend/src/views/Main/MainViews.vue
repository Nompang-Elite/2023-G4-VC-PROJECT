<template>
  <slot name="nav"></slot>
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
  <slot name="footer"></slot>
</template>

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
