<template>
  <div class="about">
    <h1>This is an about page</h1>
  </div>
</template>
<script>
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
        .get('http://localhost/test.php')
        .then((response) => {
          this.items = response.data
        })
        .catch((error) => {
          console.log('Error fetching data: ', error)
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
