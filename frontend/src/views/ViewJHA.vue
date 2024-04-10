<template>
  <div>
    <div id="controls"></div>
    <div id="formList">
      <div v-for="(a, b) in forms" :key="b" class="formList-Item" @click="clickie(a.formId)">
        <div class="list-department">{{ a['departmentName'] }}</div>
        <div class="list-activity">{{ a['activity'] }}</div>
        <div class="list-date">{{ a['formDate'] }}</div>
        <!-- <div id="editControls">
          <div class="editButton">Edit</div>
          <div class="deleteButton">Delete</div>
        </div> -->
      </div>
    </div>
  </div>
</template>
<script setup>
import { useRoute, useRouter } from 'vue-router'
import { store } from '../store/store'
import axios from 'axios'
import { ref, onMounted } from 'vue'
const route = useRouter()
const dd = [
  { departmentName: 'a', activity: 'a', fromDate: 'a', id: 1 },
  { departmentName: 'b', activity: 'b', fromDate: 'b', id: 2 },
  { departmentName: 'c', activity: 'c', fromDate: 'c', id: 3 },
  { departmentName: 'd', activity: 'd', fromDate: 'd', id: 4 },
  { departmentName: 'e', activity: 'e', fromDate: 'e', id: 5 }
]
const forms = ref([])
function clickie(d) {
  store.setView(d)
  route.push({ path: '/' })
}
// const clickie() =>{
// 	console.log('you cliked me');
// }
onMounted(() => {
  axios.get('http://localhost/endpoint/forms.php').then((response) => {
    console.log(response)
    forms.value = response
  })
})
</script>
<style scoped>
.formList-Item {
  padding: 10px 0;
  background-color: #f2f6fc;
  display: flex;
  box-shadow: inset 0 -1px 0 0 rgba(100, 121, 143, 0.122);
  position: relative;
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
