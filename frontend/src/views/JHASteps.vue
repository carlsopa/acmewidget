<template>
  <div>
    <form>
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
        <div class="form-group col-sm-3 child">
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
        <div class="form-group col-sm-3 child">
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
        <div class="form-group col-sm-2 child">
          <button>Add Photo</button>
        </div>
      </div>
    </form>
    <div>
      <button @click="cancel()">Cancel</button>
      <button @click="add()">Add step</button>
      <button @click="create()">Finish</button>
    </div>
  </div>
</template>
<script lang="ts">
import axios from 'axios'
import { defineComponent } from 'vue'
import type { Hazard } from '../types'
export default defineComponent({
  data() {
    return {
      hazards: [] as Hazard[],
      hazardControl: '',
      control: '' as String,
      formData: {
        hazardId: '' as String,
        stepDescription: ''
      }
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      axios.get('http://localhost/hazards.php').then((response) => {
        console.log(response.data)
        this.hazards = response.data
      })
    },
    cancel() {
      axios
        .post('http://localhost/create.php', { buttonClick: 'CANCEL' })
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          console.log(error)
        })
    },
    add() {
      console.log(this.formData)
      axios
        .post('http://localhost/create.php', { buttonClick: 'INCLUDE', formData: this.formData })
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          console.log(error)
        })
    },
    create() {
      axios
        .post('http://localhost/create.php', { buttonClick: 'CREATEJSA' })
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          console.log(error)
        })
    }
  },
  watch: {
    hazardControl: function (newHazard, oldHazard) {
      console.log(newHazard)
      this.hazards
        .filter((record) => record.hazards == newHazard)
        .forEach((p) => {
          console.log(p.hazards)
          console.log(p.controls)
          console.log(p.hazardsId)
          this.control = p.controls
          this.formData.hazardId = p.hazardsId
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
