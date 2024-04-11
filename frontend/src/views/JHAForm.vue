<template>
  <div>
    <div class="form-controls">
      <div @click="deleteForm()">Delete</div>
      <div @click="editForm()">Edit</div>
    </div>
    <div class="jha-form">
      <div class="jha-metadata">
        <div class="form-row">
          <div class="formActivity">{{ metaData['activity'] }}</div>
          <div class="formDate">{{ metaData['formDate'] }}</div>
        </div>
        <div class="form-row">
          <div class="col-sm-6">
            <span class="formTitle">Department:</span>
            {{ metaData['departmentName'] }}
          </div>
          <div class="col-sm-6">
            <span class="formTitle">Location:</span>
            {{ metaData['formLocation'] }}
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-6">
            <span class="formTitle">Preparer</span>{{ metaData['associate_name1'] }}
          </div>
          <div class="col-sm-6">
            <span class="formTitle">Preparer title</span>{{ metaData['associate_title1'] }}
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-6">
            <span class="formTitle">Supervisor</span>{{ metaData['associate_name2'] }}
          </div>
          <div class="col-sm-6">
            <span class="formTitle">Supervisor Title</span>{{ metaData['associate_title2'] }}
          </div>
        </div>
      </div>
      <div class="jha-steps">
        <div v-for="(u, x) in stepData" :key="x" class="form-row">
          <div class="stepDesc col-sm-3">{{ u['step_description'] }}</div>
          <div v-if="u['hazard_controls'].length > 1" class="form-row col-sm-9">
            <div v-for="(hc, x) in u['hazard_controls']" :key="x" class="hazardControl form-row">
              <div class="hazardDesc col-sm-6">{{ hc['hazard'] }}</div>
              <div class="controlDesc col-s-6">{{ hc['control'] }}</div>
            </div>
          </div>
          <div
            v-else
            v-for="(hc, x) in u['hazard_controls']"
            :key="x"
            class="hazardControl form-row col-sm-9"
          >
            <div class="hazardDesc col-sm-6">{{ hc['hazard'] }}</div>
            <div class="controlDesc col-sm-6">{{ hc['control'] }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup type="ts">
import axios from 'axios'
import {ref,onMounted} from 'vue'
import {store} from '../store/store'
import {useRouter} from 'vue-router'
const metaData = ref({})
const stepData = ref({})
const deleteForm=()=>{
  if(confirm("do you want this?")){
    axios.get('http://localhost/delete/delete.php',{params:{id:store.formView}}).then((response)=>{
      console.log(response);
    })
  }
}
onMounted(()=>{
  console.log('this');
  console.log(store)
	axios.get('http://localhost/endpoint/get/creation.php',{params:{id:store.formView}}).then((response) => {
        console.log(response.data)
        store.setFormValue(response.data);
				metaData.value = response.data['commonData'];
        stepData.value = response.data['uniqueData'];
      })

    })
</script>
