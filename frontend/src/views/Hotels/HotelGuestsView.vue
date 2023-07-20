<template>
  <!-- Using the items props to pass down the data list for card -->
  <Table :items ="desserts"/>
</template>
<script>
import Table from "@/components/Cards/TableListGuests.vue";
// import api from "@/routes/api";
export default {
  components: { Table },
  // created() {
  //   api.api_base.get(`/hotel/${1}/guests`).then((res) => {
  //     if (res.data) {
  //       console.log(res.data.data);
  //       this.listGuests = res.data.data;
  //     }
  //   });
  // },
  data () {
      return {
        desserts: [
          {
            name: 'Burger',
            calories: 660,
          },
          {
            name: 'Sandwich',
            calories: 660,
          },
          {
            name: 'Cheese Whopper',
            calories: 790,
          },
          {
            name: 'Cheese Whopper',
            calories: 790,
          },
          {
            name: 'Cheese Whopper',
            calories: 790,
          },
          {
            name: 'Cheese Whopper',
            calories: 790,
          },
          {
            name: 'Bacon King',
            calories: 1150,
          },
        ],
      }
    },
};
</script>
