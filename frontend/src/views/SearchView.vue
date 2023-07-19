<template>
  <!-- <Card :items="User.results" /> -->
  <Card :items="Guest.results" container-name="Results" />
</template>

<script>
import { useGuestStore } from "@/store/GuestStore";
import Card from "@/components/Cards/HotelCard.vue";
import { reactive } from "vue";
export default {
  components: { Card },
  setup() {
    const Guest = reactive(useGuestStore());
    return { Guest };
  },
};
</script>
@/store/GuestsStore
