<template>
  <container>
    <formJSA @activate="stepActivate" />
    <createStep v-if="step" />
    <div v-if="step" style="display: flex; justify-content: center; margin-top: 30px">
      <button @click="clickie()" class="btn btn-info" style="font-size: 25px">Finish form</button>
    </div>
  </container>
</template>
<script setup lang="ts">
import formJSA from '../components/formJSA.vue'
import createStep from '../components/createStep.vue'
import { ref } from 'vue'
import { store } from '../store/store.js'
import { useRouter } from 'vue-router'

const route = useRouter()
const step = ref(false)
const stepActivate = () => {
  console.log('second good')
  step.value = true
}
function clickie() {
  route.push({ path: '/view' })
}
</script>
