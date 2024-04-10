<template>
  <form>
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
          v-model="formData.createdDate"
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
        <input
          class="form-control"
          id="locationInput"
          name="locationInput"
          type="text"
          v-model="formData.location"
        />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="preparerInput">Preparer</label>
        <select
          class="form-control"
          id="departmentInput"
          name="preparerInput"
          v-model="preparerName"
        >
          <option v-for="person in people" :key="person.associateId">
            {{ person.associateName }}
          </option>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="titleInput">Title</label>
        <input
          class="form-control"
          id="titleInput"
          name="titleInput"
          readonly
          :placeholder="`${preparerTitle}`"
          v-model="preparerTitle"
        />
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
        <label for="activityInput">Activity</label>
        <input
          class="form-control"
          id="activityInput"
          name="titleInput"
          type="text"
          v-model="formData.activity"
        />
      </div>
    </div>
    <input type="hidden" name="did" :value="`${deptId}`" />
    <input type="hidden" name="eid" :value="`${employeeId}`" />
  </form>
  <button @click="createJSA()">Click Me!!</button>
</template>
<script lang="ts">
import axios from 'axios'
import { defineComponent } from 'vue'
import { store } from '../store/store'
import type { Associate, Department } from '../types'

export default defineComponent({
  data() {
    return {
      preparerName: '',
      departmentName: '',
      preparerTitle: '',
      supervisorName: '' as String,
      department: [] as Department[],
      people: [] as Associate[],
      employeeId: 0,
      deptId: 0,
      formData: {
        dept: 0,
        createdDate: '',
        preparer: 0,
        location: '',
        activity: ''
      }
    }
  },
  created() {
    this.formData.createdDate = new Date().toLocaleDateString()
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
    },
    createJSA() {
      console.log(this.formData)
      axios
        .post('http://localhost/create.php', { buttonClick: 'ADD', formData: this.formData })
        .then((response) => {
          console.log(response)
          console.log(response.status)
          if (response.status == 200) {
            store.count = 202
            console.log(response.data)
            console.log('first good')
            this.$emit('activate')
          }
        })
        .catch((error) => {
          console.log(error)
        })
    }
  },
  watch: {
    departmentName: function (newname, oldname) {
      console.log(newname)

      this.department
        .filter((record) => record.departmentName == newname)
        .forEach((p) => {
          this.supervisorName = p.associateName
          this.formData.dept = p.departmentID
        })
    },
    preparerName: function (newname, oldname) {
      console.log(newname)
      this.people
        .filter((record) => record.associateName == newname)
        .forEach((p) => {
          console.log(p)
          this.preparerTitle = p.associateTitle
          this.formData.preparer = p.associateId
        })
    }
  }
})
</script>
