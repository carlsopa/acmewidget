<template>
  <div>
    <div class="form-controls" style="display: flex; gap: 20px; padding: 15px 0">
      <div @click="deleteForm()" class="btn btn-secondary">Delete</div>
    </div>
    <div class="jha-form">
      <div class="jha-metadata">
        <div class="form-row" style="justify-content: space-between">
          <div class="formActivity" style="font-size: 30px; font-weight: 800">
            {{ metaData['activity'] }}
          </div>
          <div class="formDate" style="font-style: italic; font-size: 16px">
            {{ metaData['formDate'] }}
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-6">
            <span class="formTitle">Department:</span>
            <span class="formText">{{ metaData['departmentName'] }}</span>
          </div>
          <div class="col-sm-6">
            <span class="formTitle">Location:</span>

            <span class="formText">{{ metaData['formLocation'] }}</span>
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-6">
            <span class="formTitle">Preparer</span>
            <span class="formText">{{ metaData['associate_name1'] }}</span>
          </div>
          <div class="col-sm-6">
            <span class="formTitle">Preparer title</span>
            <span class="formText">{{ metaData['associate_title1'] }}</span>
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-6">
            <span class="formTitle">Supervisor</span>
            <span class="formText">{{ metaData['associate_name2'] }}</span>
          </div>
          <div class="col-sm-6">
            <span class="formTitle">Supervisor Title</span>
            <span class="formText">{{ metaData['associate_title2'] }}</span>
          </div>
        </div>
      </div>
      <div class="jha-steps" v-if="stepData.length > 0">
        <div class="form-row">
          <div class="stepTitle col-sm-6">Step Description</div>
          <div class="stepTitle col-sm-6">Hazard/Controls</div>
        </div>
        <div v-for="(u, x) in stepData" :key="x" class="form-row" style="margin: 15px 0">
          <div class="stepDesc col-sm-3">{{ u['step_description'] }}</div>
          <div v-if="u['hazard_controls'].length > 1" class="form-row col-sm-9">
            <div v-for="(hc, x) in u['hazard_controls']" :key="x" class="hazardControl form-row">
              <div class="hazardDesc col-sm-6">
                <div>Hazard:</div>
                {{ hc['hazard'] }}
              </div>
              <div class="controlDesc col-sm-6">
                <div>Control:</div>
                {{ hc['control'] }}
              </div>
            </div>
          </div>
          <div
            v-else
            v-for="(hc, x) in u['hazard_controls']"
            :key="x"
            class="hazardControl form-row col-sm-9"
          >
            <div class="hazardDesc col-sm-6">
              <div>Hazard:</div>
              {{ hc['hazard'] }}
            </div>
            <div class="controlDesc col-sm-6">
              <div>Control:</div>
              {{ hc['control'] }}
            </div>
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
    axios.delete('http://localhost/api/delete/form',{params:{id:store.formView}}).then((response)=>{
      console.log(response);
    })
  }
}
onMounted(()=>{
  console.log('this');
  console.log(store)
	axios.get('http://localhost/endpoint/api/create',{params:{id:store.formView}}).then((response) => {
        console.log(response.data)
        store.setFormValue(response.data);
				metaData.value = response.data['commonData'];
        stepData.value = response.data['uniqueData'];
      })

    })
</script>
<style scoped>
.formTitle {
  font-weight: 600;
  font-size: 24px;
  margin-right: 10px;
}
.formText {
  font-size: 18px;
}
.jha-steps {
  margin-top: 40px;
}
.hazardControl {
  margin: 5px 0;
}
.stepTitle {
  font-size: 26px;
  font-style: italic;
}
</style>
