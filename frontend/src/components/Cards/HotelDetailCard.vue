<template>
    <!-- ==========Card Hotel========== -->
    <v-col class="mx-auto " cols="12" style="background-color: rgb(138, 142, 144)">
      <v-card color="#E0E0E0" dark class="d-flex mx-auto my-auto" height="300">
        <img
          src="https://media.istockphoto.com/id/104731717/photo/luxury-resort.jpg?s=612x612&w=0&k=20&c=cODMSPbYyrn1FHake1xYz9M8r15iOfGz9Aosy9Db7mI="
          :width="450" />
        <div>
          <v-card-title class="text-h5"> hello Name </v-card-title>

          <v-title class="ma-1" color="red">
            <v-icon size="large">mdi-bank</v-icon>
            <v-title text> address </v-title><br />

            <v-icon color="#933" size="large">mdi-map-marker</v-icon>
            <v-title text> description</v-title><br />
          </v-title>
        </div>
      </v-card>
    </v-col><br><br>
</template>