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
          >
            <v-img
              class="align-end text-white"
              height="200"
              :src="'data:image/*;base64,' + item.image_hash"
              cover
            >
            </v-img>

            <v-card-title>{{ item.name }}</v-card-title>

            <v-card-subtitle class="pt-4 text-capitalize">
              {{ item.info.city + ", " + item.info.country }}
            </v-card-subtitle>

            <v-card-text class="card-text">
              <div>{{ item.description }}</div>
            </v-card-text>

            <v-card-actions class="ma-2">
              <!-- Rating point -->
              <v-rating
                color="yellow"
                size="20"
                v-model="item.rate"
                disabled
              ></v-rating>
              <v-spacer></v-spacer>
              <v-btn
                rounded="xl"
                color="info"
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
