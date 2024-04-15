<template>
  <div>
    <div id="controls"></div>
    <div id="formList">
      <div v-for="(a, b) in forms" :key="b" class="formList-Item" @click="openForm(a.formId)">
        <div class="list-department">{{ a['departmentName'] }}</div>
        <div class="list-activity">{{ a['activity'] }}</div>
        <div class="list-date">{{ a['formDate'] }}</div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { useRouter } from 'vue-router'
import { store } from '../store/store'
import axios from 'axios'
import { ref, onMounted } from 'vue'
const route = useRouter()
const forms = ref([])
function openForm(formId) {
  store.setView(formId)
  route.push({ path: '/form' })
}
onMounted(() => {
  axios.get('http://localhost/api/forms').then((response) => {
    console.log(response)
    forms.value = response.data
  })
})
</script>
<style scoped>
.formList-Item {
  padding: 10px 10px;
  background-color: #f2f6fc;
  display: flex;
  box-shadow: inset 0 -1px 0 0 rgba(100, 121, 143, 0.122);
  position: relative;
  justify-content: space-between;
}
.formList-Item:hover {
  box-shadow:
    inset 1px 0 0 #dadce0,
    inset -1px 0 0 #dadce0,
    0 1px 2px 0 rgba(60, 64, 67, 0.3),
    0 1px 3px 1px rgba(60, 64, 67, 0.15);
  z-index: 2;
}
</style>
