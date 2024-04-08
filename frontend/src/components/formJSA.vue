<template>
  <form>
    <h2>Paul</h2>
    <div class="form-row">
      <div class="form-group col-sm-10">
        <label for="departmentInput">Department</label>
        <select
          class="form-control"
          id="departmentInput"
          name="departmentInput"
          v-model="departmentName"
        >
          <option v-for="dept in department" :key="dept.departmentID">
            {{ dept.departmentName }}
          </option>
        </select>
      </div>
      <div class="form-group col-sm-2">
        <label for="dateInput">Date</label>
        <input
          class="form-control"
          id="dateInput"
          name="dateInput"
          type="text"
          placeholder="date goes here"
          readonly
        />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="supervisorInput">Supervisor</label>
        <input
          class="form-control"
          id="supervisorInput"
          name="supervisorInput"
          readonly
          :placeholder="`${supervisorName}`"
          v-model="supervisorName"
        />
      </div>
      <div class="form-group col-sm-6">
        <label for="locationInput">Location</label>
        <input class="form-control" id="locationInput" name="locationInput" type="text" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="preparerInput">Preparer</label>
        <input class="form-control" id="preparerInput" name="preparerInput" type="text" />
      </div>
      <div class="form-group col-sm-6">
        <label for="titleInput">Title</label>
        <input class="form-control" id="titleInput" name="titleInput" type="text" />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
        <label for="activityInput">Activity</label>
        <input class="form-control" id="activityInput" name="titleInput" type="text" />
      </div>
    </div>
  </form>
</template>
<script lang="ts">
import axios from 'axios'
import { defineComponent } from 'vue'
import type { Associate, Department } from '../types'
export default defineComponent({
  data() {
    return {
      departmentName: '',
      supervisorName: '' as String,
      department: [] as Department[],
      people: [] as Associate[]
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      console.log('fetch data')
      axios
        .get('http://localhost/departments.php') // Assuming your PHP backend is running on port 8081
        .then((response) => {
          console.log(typeof response.data)
          this.department = response.data[0]
          this.people = response.data[1]
          console.log(response.data[0])
          console.log('-------')
          console.log(response.data[1])
        })
        .catch((error) => {
          console.error('Error fetching data:', error)
        })
    }
  },
  watch: {
    departmentName: function (newname, oldname) {
      console.log(newname)

      this.department
        .filter((record) => record.departmentName == newname)
        .forEach((p) => (this.supervisorName = p.associateName))
    }
  }
})
</script>
