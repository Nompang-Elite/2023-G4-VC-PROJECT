<template>
  {{ user }}
  <HelloWorld />
</template>

<script>
import { defineComponent } from "vue";

// Components
import HelloWorld from "../components/HelloWorld.vue";
import { useUserStore } from "@/store/UserStore";
export default defineComponent({
  name: "HomeView",

  setup() {
    const user = useUserStore();
    return { user };
  },
  components: {
    HelloWorld,
  },
});
</script>
