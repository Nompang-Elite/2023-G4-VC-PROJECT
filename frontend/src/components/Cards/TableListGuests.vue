<!-- Source Idea: https://vuetifyjs.com/en/components/tables/ -->
<template>
  <v-container>
    <v-row class="mt-5" style="margin-left: 11%">
      <v-col cols="6">
        <v-text-field
          placeholder="Search"
          density="compact"
          variant="solo"
          rounded="pill"
        ></v-text-field>
      </v-col>
      <v-col cols="2" class="mt-1 d-flex" style="margin: 5%">
        <v-btn class="mx-6 bg-info" rounded="pill">Check In</v-btn>
        <v-btn class="bg-red-darken-1" rounded="pill">Check Out</v-btn>
      </v-col>
    </v-row>
    <!-- ------------Table reserved--------------- -->
    <v-table>
      <thead>
        <tr>
          <th class="text-left">USER ID</th>
          <th class="text-left">NAME</th>
          <th class="text-left">GENDER</th>
          <th class="text-left">STATUS</th>
          <th class="text-left">ID</th>
          <th class="text-left">DATE IN</th>
          <th class="text-left">DATE OUT</th>
          <th class="text-left">ROOM NUMBER</th>
          <th class="text-left">ROOM TYPE</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in items" :key="index">
          <td>{{ item.user_id }}</td>
          <td>{{ item.firstname + " " + item.lastname }}</td>
          <td>{{ item.gender }}</td>
          <td>{{ item.made_by }}</td>
          <td>{{ item.id }}</td>
          <td>{{ item.date_in }}</td>
          <td>{{ item.date_out }}</td>
          <td>{{ item.room_status }}</td>
          <td>{{ item.room_type }}</td>
        </tr>
      </tbody>
    </v-table>
  </v-container>
</template>
<script>
export default {
  // Proping the items list
  props: ["items"],
};
</script>
<style></style>
