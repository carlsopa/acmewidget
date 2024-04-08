<template>
  <div class="about">
    <h1>This is an about page</h1>
    <!-- <ul>
      <li v-for="person in people" :key="person.associateId">
        {{ person.associateName }} : {{ person.associateRole }}
      </li>
    </ul> -->
  </div>
</template>
<!-- <script setup lang="ts">
console.log('Hello Paul, does this work?')
</script> -->
<script lang="ts">
import axios from 'axios'
import { defineComponent } from 'vue'
import type { Associate } from '../types'

export default defineComponent({
  data() {
    return {
      people: [] as Associate[]
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      axios
        .get('http://localhost/associates.php') // Assuming your PHP backend is running on port 8081
        .then((response) => {
          this.people = response.data
          console.log(response.data)
        })
        .catch((error) => {
          console.error('Error fetching data:', error)
        })
    }
  }
})
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
