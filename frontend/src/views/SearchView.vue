<template>
  <Card :items="User.results" />
</template>

<script>
import { useUserStore } from "@/store/UserStore";
import Card from "@/components/Cards/HotelCard.vue";
export default {
  components: { Card },
  setup() {
    return { User: useUserStore() };
  },
};
</script>
