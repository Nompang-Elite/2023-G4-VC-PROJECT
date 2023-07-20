<template>
  <!-- Using the items props to pass down the data list for card -->
  <Table :items ="desserts"/>
</template>
<script>
import Table from "@/components/Cards/TableListGuests.vue";
import api from "@/routes/api";
export default {
  components: { Table },
  created() {
    api.api_base
    .get(`/hotel/2/guests/reserved`)
    .then((res) => {
      if (res.data) {
        console.log(res.data.data);
        // Assign the data to a component variable
        this.desserts = res.data.data;
      }
    })
    .catch((error) => {
      console.log(error);
    });
  },
  data () {
      return {
        desserts: [
          // {
          //   name: 'Burger',
          //   calories: 660,
          // },
          // {
          //   name: 'Sandwich',
          //   calories: 660,
          // },
          // {
          //   name: 'Cheese Whopper',
          //   calories: 790,
          // },
          // {
          //   name: 'Cheese Whopper',
          //   calories: 790,
          // },
          // {
          //   name: 'Cheese Whopper',
          //   calories: 790,
          // },
          // {
          //   name: 'Cheese Whopper',
          //   calories: 790,
          // },
          // {
          //   name: 'Bacon King',
          //   calories: 1150,
          // },
        ],
      }
    },
};
</script>
