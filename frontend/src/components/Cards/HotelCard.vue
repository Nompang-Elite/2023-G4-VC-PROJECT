<template>
  <!-- Card container -->
  <v-container class="mb-8">
    <header class="py-4 text-h5">{{ containerName }}</header>
    <v-row v-if="items.length > 0">
      <v-col cols="4" v-for="(item, i) in items" :key="i">
        <!-- Set card hovering effect -->
        <v-hover v-slot="{ isHovering, props }">
          <!-- Source Idea: https://vuetifyjs.com/en/components/hover/  -->
          <v-card
            class="mx-auto"
            max-width="400"
            rounded="xl"
            :elevation="isHovering ? 12 : 2"
            :class="{ 'on-hover': isHovering }"
            v-bind="props"
            color="#F0FAFF"
          >
            <v-img
              class="align-end"
              height="200"
              :src="'data:image/*;base64,' + item.image_hash"
              cover
            >
            </v-img>

            <v-card-title class="mx-4 mt-4">{{ item.name }}</v-card-title>

            <v-card-subtitle class="text-capitalize mx-4">
              {{ item.info.city + ", " + item.info.country }}
            </v-card-subtitle>

            <v-card-text class="card-text mx-4 text-justify">
              <div>{{ item.description }}</div>
            </v-card-text>

            <v-card-actions class="ma-4 mx-6">
              <!-- Rating point -->
              <v-rating
                color="#E63946"
                size="20"
                v-model="item.rate"
                disabled
              ></v-rating>
              <v-spacer></v-spacer>
              <v-btn
                color="info"
                rounded="xl"
                variant="elevated"
                class="px-4"
                @click="goToDetail(item.id)"
              >
                Details
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-hover>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  // Proping the items list
  props: ["items", "container-name"],
  methods: {
    goToDetail(id) {
      console.log(id);
      // Navigate to the detail page with the selected hotel's ID as a parameter
      this.$router.push(`/hotel/${id}`);
    },
  },
};
</script>
<style scoped>
.card-text {
  overflow-y: hidden;
  height: 6rem;
}
</style>
