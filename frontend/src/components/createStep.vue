<template>
  <div>
    <div id="stepControls" class="form-row">
      <div class="form-group col-sm-12">
        <div v-for="(step, x) in steps" :key="x" class="form-row">
          <input
            type="text"
            readonly
            class="form-control col-sm-4"
            :placeholder="`${step.stepDescription}`"
          />
          <div class="col-sm-8">
            <div v-for="(h, x) in step['hazard']" :key="x" style="display: flex">
              <input type="text" readonly class="form-control" :placeholder="`${h.hazard}`" />
              <input type="text" readonly class="form-control" :placeholder="`${h.control}`" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <form id="stepForm">
      <div class="form-row">
        <div class="form-group col-sm-4">
          <label for="stepDescription">Step</label>
          <input
            type="text"
            class="form-control"
            style="height: 150px"
            v-model="formData.stepDescription"
          />
        </div>
        <div id="hazardsSection" class="form-group col-sm-8">
          <div
            id="hazardSelectionContainer"
            style="height: 40%; overflow: scroll; margin-bottom: 10px"
          >
            <div v-for="(step, x) in hazardsAdded" :key="x" class="" style="display: flex">
              <input type="text" readonly class="form-control" :placeholder="`${step.hazard}`" />
              <input type="text" readonly class="form-control" :placeholder="`${step.control}`" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group child col-sm-6">
              <label for="hazardSelection">Hazards</label>
              <select
                class="form-group"
                id="hazardSelection"
                name="hazardSelection"
                v-model="hazardControl"
                style="width: 150px"
              >
                // eslint-disable-next-line vue/valid-v-for
                <option v-for="hazard in hazards" :key="0">{{ hazard.hazards }}</option>
              </select>
            </div>
            <div class="form-group child col-sm-6">
              <label for="hazardControl">Controls</label>
              <input
                type="text"
                id="hazardControl"
                name="hazardControl"
                class="form-group"
                read-only
                :placeholder="`${control}`"
                v-model="control"
              />
            </div>
          </div>
        </div>
      </div>
    </form>
    <div>
      <button @click="add()">Add step</button>
    </div>
  </div>
</template>
<script>
import axios from 'axios'
import { defineComponent } from 'vue'
import { store } from '../store/store'
export default defineComponent({
  data() {
    return {
      hazardsAdded: [],
      hazards: [],
      hazardControl: '',
      control: '',
      formData: {
        hazardId: '',
        stepDescription: '',
        hazardList: []
      },
      steps: []
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      axios.get('http://localhost/endpoint/get/hazards.php').then((response) => {
        console.log(response)
        this.hazards = response.data
        store.setHazardValue(response.data)
      })
    },
    add() {
      console.log(this.formData)
      axios
        .post('http://localhost/endpoint/put/stepdata.php', {
          formData: this.formData,
          formId: store.jsaId
        })
        .then(() => {})
        .catch((error) => {
          console.log(error)
        })
      this.steps.push({
        stepDescription: this.formData.stepDescription,
        hazard: this.hazardsAdded,
        control: this.control
      })
      this.hazardControl = ''
      this.control = ''
      this.formData.stepDescription = ''
      this.hazardsAdded = []
      this.formData.hazardList = []
    }
  },
  watch: {
    hazardControl: function (newHazard, oldHazard) {
      console.log(newHazard)
      this.hazards
        .filter((record) => record.hazards == newHazard)
        .forEach((p) => {
          this.formData.hazardList.push(p.hazardsId)
          this.control = p.controls
          this.formData.hazardId = p.hazardsId
          this.hazardsAdded.push({ hazard: p.hazards, control: p.controls })
        })
    }
  }
})
</script>
<style scoped>
.child {
  display: flex;
  align-items: center;
}
.child label {
  margin-right: 10px;
}
</style>
