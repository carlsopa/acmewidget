<template>
  <div>
    <label for="departmentInput">Department</label>
    <select
      class="form-control"
      id="departmentInput"
      name="departmentInput"
      :value="modelValue"
      @change="$emit('update:modelValue', $event.target.value)"
    >
      <option v-for="dept in options" :key="dept.departmentID" :value="dept.departmentName">
        {{ dept.departmentName }}
      </option>
    </select>
  </div>
</template>
<script>
export default {
  props: ['modelValue', 'options']
}
</script>
