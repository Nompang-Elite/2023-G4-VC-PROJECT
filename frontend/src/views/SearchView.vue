<template>
  <!-- <Card :items="User.results" /> -->
  <Card :items="results" container-name="Results" />
</template>

<script>
import { useUserStore } from "@/store/UserStore";
import Card from "@/components/Cards/HotelCard.vue";
import { toRefs } from "vue";
export default {
  components: { Card },
  setup() {
    // return { User: useUserStore() };
    return toRefs(useUserStore());
  },
};
</script>
