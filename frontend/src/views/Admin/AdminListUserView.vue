<template>
  <v-row class="mt-1 mx-16 pa-5">
          <v-col cols="6">
              <v-text-field
              placeholder="Search"
              density="compact"
              variant="solo"
              rounded="pill"
              ></v-text-field>
          </v-col>
          <v-col cols="2" class="mt-1 d-flex ">
            <v-btn class="mx-6 bg-info" rounded="pill" @click="guestList">Guest</v-btn>
            <v-btn class="bg-info" rounded="pill" @click="ownerList">Hotel Owner</v-btn>
          </v-col>
  </v-row>
  <v-table style="margin-bottom: 12px; width: 85%;margin: auto; background-color: rgb(247, 245, 241);border-radius: 5px;">
    <thead >
      <tr>
        <th class="text-left">First Name</th>
        <th class="text-left">Last Name</th>
        <th class="text-left">Phone</th>
        <th class="text-left">Gender</th>
        <th class="text-left">Email</th>
        <th class="text-left">User Type</th>
        <th class="text-left">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(user, i) in users" :key="i">
        <td>{{ user.firstname }}</td>
        <td>{{ user.lastname}}</td>
        <td>{{ user.phone}}</td>
        <td>{{ user.gender}}</td>
        <td>{{ user.email}}</td>
        <td>{{ user.user_type}}</td>
        <td class="d-flex mt-5">
          <v-btn rounded="pill"  color="white" variant="text"   style="background-color: rgb(186, 19, 19);">Delete Account</v-btn>
        </td>
      </tr>
    </tbody>
  </v-table>
</template>
<script>
import api from "@/routes/api";
  export default {
    data () {
      return {
        users: [],
      }
    },
    beforeMount() {
      api.api_base
      .get('/admin/users/all')
      .then((res) => {
        let data = res.data.data
        this.users = data
      })
      .catch((err) => {
        console.log(err);
      })
    },
    methods: {
      guestList() {
        api.api_base
        .get('/admin/users/guests')
        .then((res) => {
          let data = res.data.data
          this.users = data
        })
        .catch((err) => {
          console.log(err);
        });
      },
      ownerList() {
        api.api_base
        .get('/admin/users/owners')
        .then((res) => {
          let data = res.data.data
          console.log(data)
          this.users = data
        })
        .catch((err) => {
          console.log(err);
        });
      },
    }
  }
</script>
