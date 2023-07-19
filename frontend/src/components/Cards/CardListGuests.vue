<template>
    <v-container>
        <v-row class="mt-5" style="margin-left: 11%;">
          <v-col cols="6">
              <v-text-field
              placeholder="Search"
              density="compact"
              variant="solo"
              rounded="pill"
              ></v-text-field>
          </v-col>
          <v-col cols="2" class="mt-1 d-flex " style="margin: 5%;">
            <v-btn class="mx-6 bg-info" rounded="pill">Check In</v-btn>
            <v-btn class="bg-red-darken-1" rounded="pill">Check Out</v-btn>
          </v-col>
        </v-row>
        <v-card style="width: 76%; background-color: rgb(243, 241, 242); margin: auto;padding: 10px;" flat>
            <v-toolbar-title class="mt-5, ml-5">List Of Guests</v-toolbar-title>
            <v-card-text class="d-flex" style="justify-content: space-between;">
              <v-toolbar-title >NameUser</v-toolbar-title>
              <v-toolbar-title>Room-Number</v-toolbar-title>
              <v-toolbar-title class="ml-16">Check_in</v-toolbar-title>
              <v-toolbar-title class="ml-16">Check_out</v-toolbar-title>
            </v-card-text>
              <v-card class="rounded-xl " style="width: 97%; margin: 8px; padding: 5px; " v-for="(item, index) in items" :key="index">
                <v-list-item>
                  <v-list-item-content class="d-flex" style="justify-content:space-between;">
                    <v-list-item-title > {{ item.NameUser }}</v-list-item-title>
                    <v-list-item-title>{{ item.Room_Number}}</v-list-item-title>
                    <v-list-item-title>{{ item.Check_in }}</v-list-item-title>
                    <v-list-item-title> {{ item.Check_out}}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-card>
        </v-card>
    </v-container>
  </template>
  <script>
  export default {
    // Proping the items list
    props: ["items",],
  };
  </script>
  <style >
 
  </style>
  