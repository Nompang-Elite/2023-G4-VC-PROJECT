<template>
    <!-- Using the items props to pass down the data list for card -->
    <Card :items="listGuests"  />
</template>
<script>
import Card from "@/components/Cards/CardListGuests.vue";
export default {
    components: { Card },
  data() {
    return {
      listGuests: [
        { name: 'John Smith', date: '2023-07-18', roomNumber: '101', action: 'Check-in' },
        { name: 'Jane Doe', date: '2023-07-19', roomNumber: '102', action: 'Check-in' },
        { name: 'Bob Johnson', date: '2023-07-19', roomNumber: '103', action: 'Check-in' },
        { name: 'Sarah Lee', date: '2023-07-20', roomNumber: '104', action: 'Check-in' },
        { name: 'Sreyhay', date: '2023-07-13', roomNumber: '105', action: 'Check-in' },
        { name: 'Sreytoch', date: '2023-03-12', roomNumber: '106', action: 'Check-in' },
        { name: 'Sara', date: '2023-02-21', roomNumber: '107', action: 'Check-in' },
        { name: 'Makara', date: '2023-03-22', roomNumber: '108', action: 'Check-in' },
        { name: 'Kakada', date: '2023-02-25', roomNumber: '109', action: 'Check-in' },
        { name: 'Sayha', date: '2023-01-20', roomNumber: '200', action: 'Check-in' },
      ],
    };
  },
}; 
</script>