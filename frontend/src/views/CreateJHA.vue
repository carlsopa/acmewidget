<template>
  <container>
    <formJSA @activate="stepActivate" />
    <createStep v-if="step" />
  </container>
</template>
<script setup lang="ts">
import formJSA from '../components/formJSA.vue'
import createStep from '../components/createStep.vue'
import { ref } from 'vue'
import { store } from '../store/store.js'

const step = ref(false)
const stepActivate = () => {
  console.log('second good')
  step.value = true
}
</script>
