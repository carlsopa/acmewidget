<script setup lang="ts">
// import { RouterLink, RouterView } from 'vue-router'
// import HelloWorld from './components/HelloWorld.vue'
</script>

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
  <!-- <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />
    <h1>Hello Paul, long time waiting!!</h1>

    <div class="wrapper">
      <HelloWorld msg="You did it!" />

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView /> -->
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
