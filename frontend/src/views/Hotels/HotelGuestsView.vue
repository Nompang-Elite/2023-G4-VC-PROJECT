<template>
  <!-- Using the items props to pass down the data list for card -->
  <Card :items="listGuests" />
</template>
<script>
import Card from "@/components/Cards/CardListGuests.vue";
import api from "@/routes/api";
export default {
  components: { Card },
  created() {
    api.api_base.get(`/hotel/${1}/guests`).then((res) => {
      if (res.data) {
        console.log(res.data.data);
        this.listGuests = res.data.data;
      }
    });
  },
  data() {
    return {
      listGuests: [
        // { NameUser: 'Sreypich', Room_Number: '11', Check_in: '2023-07-1', Check_out: '2023-07-18' },
        // { NameUser: 'Nong', Room_Number: '13', Check_in: '2023-07-12', Check_out: '2023-07-15' },
        // { NameUser: 'Soriya', Room_Number: '13', Check_in: '2023-07-18', Check_out: '2023-07-22' },
        // { NameUser: 'Dyna', Room_Number: '14', Check_in: '2023-07-16', Check_out: '2023-07-20' },
        // { NameUser: 'Linna', Room_Number: '15', Check_in: '2023-07-13', Check_out: '2023-07-18' },
        // { NameUser: 'Dariya', Room_Number: '16', Check_in: '2023-07-19', Check_out: '2023-07-23' },
        // { NameUser: 'Sreyka', Room_Number: '17', Check_in: '2023-07-12', Check_out: '2023-07-24' },
        // { NameUser: 'Thana', Room_Number: '18', Check_in: '2023-07-15', Check_out: '2023-07-19' },
        // { NameUser: 'Chhilin', Room_Number: '19', Check_in: '2023-07-16', Check_out: '2023-07-19' },
        // { NameUser: 'Makara', Room_Number: '22', Check_in: '2023-07-11', Check_out: '2023-07-18' },
      ],
    };
  },
};
</script>
