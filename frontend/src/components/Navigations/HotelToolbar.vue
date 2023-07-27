<template>
  <v-container>
    <v-toolbar rounded="xl" class="mt-4" color="#1D3557">
      <v-btn
        v-for="toolbarBtn in toolbarBtns"
        :key="toolbarBtn"
        variant="outlined"
        color="#F1FAEE"
        rounded="xl"
        class="mr-2"
        :to="toolbarBtn.to"
        >{{ toolbarBtn.text }}</v-btn
      >
    </v-toolbar>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      toolbarBtns: [
        {
          text: "home",
          to: "/owner",
        },
        {
          text: "guests",
          to: "/owner/guests",
        },
        {
          text: "rooms",
          to: "/owner/rooms",
        },
        {
          text: "reviews",
          to: "/owner/reviews",
        },
      ],
    };
  },
};
</script>
