<template>
  <v-container>
    <v-toolbar rounded="xl" class="mt-4">
      <v-btn
        v-for="toolbarBtn in toolbarBtns"
        :key="toolbarBtn"
        variant="elevated"
        rounded="xl"
        class="mr-2"
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
          to: "",
        },
        {
          text: "users",
          to: "",
        },
        {
          text: "hotels",
          to: "",
        },
      ],
    };
  },
};
</script>
