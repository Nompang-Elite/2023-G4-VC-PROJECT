<template>
  <v-carousel height="500" hide-delimiters>
    <v-carousel-item v-for="(slide, i) in slides" :key="i">
      <!-- Sample test -->
      <!-- <v-sheet height="100%">
        <div class="d-flex fill-height justify-center align-center">
          <div class="text-h2">{{ slide }} Slide</div>
        </div>
      </v-sheet> -->
      <!-- Image corousal -->
      <v-img :src=" slide.image "  height="200vh" cover></v-img>
    </v-carousel-item>
  </v-carousel>

  <!-- Card container -->
  <v-container>
    <header class="font-weight-bold" style="margin-bottom: 1rem">
      <h1>Top Hotels</h1>
      
    </header>
    <v-row>
      <v-col cols="3" v-for="(item, index) of hotels" :key="index">
        <v-card>
          <v-img :src="item.image" height="160px" cover></v-img>

          <!-- Card title gose here -->
          <v-card-title>
            {{ item.name }}
          </v-card-title>

          <!-- Card subtitle gose here -->
          <v-card-subtitle>
            {{ item.location }} Province
          </v-card-subtitle>

          <!-- Card text content gose here -->
          <v-card-text>
            {{ item.description }}

          </v-card-text>

          <!-- Card action goes here -->
          <v-card-actions class="flex-row-reverse">
            <v-btn variant="outlined"  style="background-color: rgb(199, 16, 16); color: white;" density="comfortable" flat>Details</v-btn>
            <div class="rating" >
                  <input value="star-1" name="star-radio" id="star-1" type="radio">
                  <label for="star-1">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                  </label>
                  <input value="star-1" name="star-radio" id="star-2" type="radio">
                  <label for="star-2">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                  </label>
                  <input value="star-1" name="star-radio" id="star-3" type="radio">
                  <label for="star-3">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
                  </label>
               
              </div>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      slides: [
        {
          image:"https://content.r9cdn.net/kimg/b8/6a/e7fd425d-5d242312-0.jpg",
        },
        {
          image:"https://static.wixstatic.com/media/8859a2_07ad173abdc146bc8d2bc33123ccdebc~mv2.jpg/v1/fit/w_1000%2Ch_1000%2Cal_c%2Cq_80,enc_auto/file.jpg",
        },
        {
          image:"https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?cs=srgb&dl=pexels-pixabay-258154.jpg&fm=jpg",
        },
      ],
      hotels: [],
    };
  },
  mounted() {
    axios.get('http://127.0.0.1:8000/api/hotel')
      .then(response => {
        this.hotels = response.data.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
};
</script>

<style>

/* ---------------star icon-------------- */
.rating {
  margin-left: 50px;
  display: flex;
  flex-direction: row-reverse;
  gap: 0.3rem;
  --stroke: #666;
  --fill: #ffc73a;
}

.rating input {
  appearance: unset;
}

.rating label {
  cursor: pointer;
}

.rating svg {
  width: 1.5rem;
  height: 1.5rem;
  overflow: visible;
  fill: transparent;
  stroke: var(--stroke);
  stroke-linejoin: bevel;
  stroke-dasharray: 12;
  animation: idle 4s linear infinite;
  transition: stroke 0.2s, fill 0.5s;
}

@keyframes idle {
  from {
    stroke-dashoffset: 24;
  }
}

.rating label:hover svg {
  stroke: var(--fill);
}

.rating input:checked ~ label svg {
  transition: 0s;
  animation: idle 4s linear infinite, yippee 0.75s backwards;
  fill: var(--fill);
  stroke: var(--fill);
  stroke-opacity: 0;
  stroke-dasharray: 0;
  stroke-linejoin: miter;
  stroke-width: 8px;
}

@keyframes yippee {
  0% {
    transform: scale(1);
    fill: var(--fill);
    fill-opacity: 0;
    stroke-opacity: 1;
    stroke: var(--stroke);
    stroke-dasharray: 10;
    stroke-width: 1px;
    stroke-linejoin: bevel;
  }

  30% {
    transform: scale(0);
    fill: var(--fill);
    fill-opacity: 0;
    stroke-opacity: 1;
    stroke: var(--stroke);
    stroke-dasharray: 10;
    stroke-width: 1px;
    stroke-linejoin: bevel;
  }

  30.1% {
    stroke: var(--fill);
    stroke-dasharray: 0;
    stroke-linejoin: miter;
    stroke-width: 8px;
  }

  60% {
    transform: scale(1.2);
    fill: var(--fill);
  }
}

</style>

