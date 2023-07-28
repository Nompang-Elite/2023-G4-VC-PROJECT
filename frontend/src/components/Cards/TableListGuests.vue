<!-- Source Idea: https://vuetifyjs.com/en/components/tables/ -->
<template>
  <v-container>
    <h1>Guests</h1>
    <v-row>
      <!-- <v-col cols="6">
        <v-text-field
          placeholder="Search"
          density="compact"
          variant="solo"
          rounded="pill"
        ></v-text-field>
      </v-col> -->
      <v-col cols="12" class="py-8">
        <v-btn class="mr-2 bg-info" rounded="pill">Check In</v-btn>
        <v-btn class="bg-red-darken-1" rounded="pill">Check Out</v-btn>
      </v-col>
    </v-row>
    <!-- ------------Table reserved--------------- -->
    <v-table theme="dark" class="rounded-xl">
      <thead class="bg-info">
        <tr>
          <th class="text-left">NAME</th>
          <th class="text-left">ID</th>
          <th class="text-left">DATE IN</th>
          <th class="text-left">DATE OUT</th>
          <th class="text-left">ROOM NUMBER</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in items" :key="index">
          <td>{{ item.firstname + " " + item.lastname }}</td>
          <td>{{ item.id }}</td>
          <td>{{ item.date_in }}</td>
          <td>{{ item.date_out }}</td>
          <td>{{ item.room[index] }}</td>
        </tr>
      </tbody>
    </v-table>
  </v-container>
</template>
<script>
export default {
  title: "Hotel Guests",
  // Proping the items list
  props: ["items"],
};
</script>
<style></style>
