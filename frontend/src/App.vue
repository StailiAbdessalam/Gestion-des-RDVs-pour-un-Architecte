<template>
  <div>
    <nav>
      <div class="logo">
        <img src="./assets/img/logo.png" alt="" />
      </div>
      <div class="nav-content">
        <router-link class="nav-item" to="/">reservation</router-link> 
        <router-link class="nav-item" to="/404">page khra</router-link> 
        <router-link class="nav-item" to="/Auth">Authentication</router-link>
      </div>
    </nav>
    <router-view />
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
  /* color: #e3e7eb; */
}
nav {
  color: white;
  background-color: #4d7588;
  display: flex;
  justify-content: space-around;
  padding: 20px;
  align-items: center;
}
nav > a {
  color: white;
  font-size: 18px;
}
.logo img {
  height: 60px;
}
.nav-item{
  border-bottom: 2px solid black;
  margin: 10px;
  padding: 10px;
}

</style>
