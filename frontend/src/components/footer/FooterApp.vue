<template>
    <v-footer class="d-flex flex-column mt-10 " style="background-color: rgb(189, 189, 191); width: 100%;">
      <div class=" d-flex  align-center px-5  flex=4 " style=" height:30vh ; ">
            <div style=" flex=0.4;">
                <strong>ABOUT US</strong>
                <v-spacer>receiving and directing visitors, creating spreadsheets and presentations, and filing.</v-spacer>
    
            </div>
            <div style=" flex=0.4;" >
                <strong>PHONE SUPPORT</strong>
                <v-spacer>Here you can use rows and columns to organize your footer content.
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit.</v-spacer>
    
            </div>
            <v-btn
            style="flex=3;"
            v-for="icon in icons"
            :key="icon"
            class="mx-4 "
            :icon="icon"
            variant="plain"
            size="big"
            ></v-btn>
      </div>
  
      <div class="px-4 py-2 bg-black text-center w-100">
        {{ new Date().getFullYear() }} — <strong>BOOKEENG</strong>
      </div>
    </v-footer>
  </template>
<script>
export default {
  data: () => ({
    icons: [
      'mdi-facebook',
      'mdi-twitter',
      'mdi-linkedin',
      'mdi-instagram',
    ],
  }),
}
</script>