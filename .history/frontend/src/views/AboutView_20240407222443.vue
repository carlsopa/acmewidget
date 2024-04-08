<template>
  <div class="about">
    <h1>This is an about page</h1>
  </div>
</template>
<!-- <script setup lang="ts">
console.log('Hello Paul, does this work?')
</script> -->
<script lang="ts">
import axios from 'axios'

export default {
  data() {
    return {
      items: []
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      axios
        .get('http://localhost:8081/test.php') // Assuming your PHP backend is running on port 8081
        .then((response) => {
          this.items = response.data
        })
        .catch((error) => {
          console.error('Error fetching data:', error)
        })
    }
  }
}
</script>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
