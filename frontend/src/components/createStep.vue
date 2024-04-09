<template>
  <div>
    <form>
      <div class="form-row">
        <div class="form-group col-sm-4">
          <label for="stepDescription">Step</label>
          <input type="text" class="form-control" style="height: 150px" />
        </div>
        <div class="form-group col-sm-3 child">
          <label for="hazardSelection">Hazards</label>
          <input type="text" class="form-group" id="hazardSelection" name="hazardSelection" />
        </div>
        <div class="form-group col-sm-3 child">
          <label for="hazardControl">Controls</label>
          <input type="text" id="hazardControl" name="hazardControl" class="form-group" read-only />
        </div>
        <div class="form-group col-sm-2 child">
          <button>Add Photo</button>
        </div>
      </div>
      <!-- <div>
      <button>Cancel</button>
      <button>Add step</button>
      <button>Finish</button>
    </div> -->
    </form>
  </div>
</template>
<style scoped>
.child {
  display: flex;
  align-items: center;
}
.child label {
  margin-right: 10px;
}
</style>
