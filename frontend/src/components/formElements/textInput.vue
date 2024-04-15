<template>
  <input
    :id="inputId"
    :value="value"
    :readonly="readonly"
    @input="updateValue($event.target.value)"
    class="form-control"
    type="text"
  />
</template>
<script setup>
import { ref, watch } from 'vue'
const value = ''
const readonly = false
const inputId = ''
</script>
