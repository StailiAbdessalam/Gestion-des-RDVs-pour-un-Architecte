<template>
  <div>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/Auth">About</router-link>
  </nav>
  <router-view/>
  </div>
</template>

<script>
export default {
  name: "App",
  components: {},
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #e3e7eb;
  /* margin-top: 60px; */
}
</style>
