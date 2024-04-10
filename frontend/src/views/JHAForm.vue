<template>
  <div>
    <div class="form-controls">Delete Edit</div>
    <div class="jha-form">
      <div class="jha-metadata">
        <div class="form-row">
          <div>{{ data['activity'] }}</div>
          <div>{{ data['formDate'] }}</div>
        </div>
        <div class="form-row">{{ data['departmentName'] }} {{ data['location'] }}</div>
        <div class="form-row">{{ data['associate_name1'] }} {{ data['associate_title1'] }}</div>
        <div class="form-row">{{ data['associate_name2'] }} {{ data['associate_title2'] }}</div>
        <!-- {{ data }} -->
        <!-- Activity Date Department Location Supervisor position preparer position -->
      </div>
      <!-- <div class="jha-steps">Step Hazard Control</div> -->
    </div>
  </div>
</template>
<script setup type="ts">
import axios from 'axios'
import {ref,onMounted} from 'vue'
import {store} from '../store/store'
import {useRouter} from 'vue-router'
const data = ref({})

onMounted(()=>{
	axios.get('http://localhost/endpoint/creation.php',{params:{id:store.jsaId}}).then((response) => {
        console.log(response.data)
				data.value = response.data[1];
      })

})
</script>
