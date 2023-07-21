<template>
  <!-- Using the items props to pass down the data list for card -->
  <Table :items ="listOfguests"/>
</template>
<script>
import Table from "@/components/Cards/TableListGuests.vue";
import api from "@/routes/api";
export default {
  components: { Table },
  created() {
    api.api_base
    .get(`/hotel/3/guests/reserved`)
    .then((res) => {
      if (res.data) {
        // Assign the data to a component variable
        this.listOfguests = res.data.data;
      }
    })
    .catch((error) => {
      console.log(error);
    });
  },
  data () {
      return {
        listOfguests: [],
      }
    },
};
</script>
