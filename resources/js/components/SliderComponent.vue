<template>
  <div>
    <b-carousel
      id="carousel-1"
      v-model="slide"
      :interval="4000"
      controls
      indicators
      background="#ababab"
      img-width="500"
      img-height="300"
      style="text-shadow: 1px 1px 2px #333;"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
    >
      <!-- Text slides with image -->

    <div v-for="room in rooms">
    <!-- Slides with custom text -->
      <b-carousel-slide :img-src="room['image']">
      </b-carousel-slide>
    </div>


    </b-carousel>

    <p class="mt-4">
    </p>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        slide: 0,
        sliding: null,
        rooms : []
      }
    },
    created(){
            axios.get('/api/rooms').then(response => this.rooms = response.data);
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>
