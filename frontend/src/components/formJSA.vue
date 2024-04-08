<template>
  <form>
    <div class="form-row">
      <div class="form-group col-sm-10">
        <label for="departmentInput">Department</label>
        <select class="form-control" id="departmentInput" name="departmentInput">
          <option>TEST</option>
          <option>TEST1</option>
          <option>TEST2</option>
          <option>TEST3</option>
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
        <input class="form-control" id="supervisorInput" name="supervisorInput" type="text" />
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
