<template>
  <div>
    <nav>
      <div class="logo">
        <img src="./assets/img/logo.png" alt="" />
      </div>
      <div class="nav-content">
        <router-link class="nav-item" to="/">Rendez-vous</router-link>
        <router-link class="nav-item" to="/OldRdv">Tous mes rendez-vous</router-link>
        <router-link class="nav-item" to="/z">Admin</router-link>
        <router-link class="nav-item" to="/Auth">Authentication</router-link>
      </div>
      <div class="shrink-0 flex items-center gap-2">
        <img
          class="h-14 w-14 object-cover rounded-full"
          src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"
          alt="Current profile photo"
        />
        hafid
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
button {
  border-radius: 3px;
}
nav {
  color: white;
  background-color: #0284c7;
  display: flex;
  justify-content: space-around;
  padding: 20px;
  align-items: center;
}
.nav-item {
  display: inline-block;
  position: relative;
  padding-bottom: 3px;
}
.nav-item:after {
  content: "";
  display: block;
  margin: auto;
  height: 3px;
  width: 0px;
  background: transparent;
  transition: width 0.5s ease, background-color 0.5s ease;
}
.nav-item:hover:after {
  width: 100%;
  border-radius: 18px;
  background: rgb(255, 255, 255);
}
nav > a {
  color: white;
  font-size: 18px;
}
.logo img {
  height: 60px;
}
.nav-item {
  margin: 10px;
  padding: 10px;
}
</style>
