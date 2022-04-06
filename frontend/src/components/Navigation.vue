<template lang="">
  <nav>
    <div class="logo">
      <img src="../assets/img/logo.png" alt="" />
    </div>
    <div class="nav-content">
      <router-link  class="nav-item" to="/home"
        >Home</router-link
      >
      <router-link v-if="!role" class="nav-item" to="/"
        >Authentication</router-link
      >
      <template v-if="role === 'user'">
        <router-link class="nav-item" to="/User/RDV">Rendez-vous</router-link>
        <router-link class="nav-item" to="/User"
          >Tous mes rendez-vous</router-link
        >
      </template>
      <router-link v-if="role === 'admin'" class="nav-item" to="/Admin">Admin</router-link>
      <router-link v-if="role === 'admin'" class="nav-item" to="/ALLRDV">RDV</router-link>   
    </div>
    <div class="shrink-0 flex items-center gap-2">
            <span id="hah" v-if="role" @click="logout"  class="nav-item">logout</span>
    </div>
  </nav>
</template>
<script>
export default {
  name: "nav-item",
  inject: ["role", "changeRole"],
  data() {
    return {
      role: this.role,
    };
  },
  methods: {
    logout() {
      localStorage.removeItem("role");
      this.changeRole("");
      this.$router.push("/");
    },
  },
};
</script>
<style>
.nav-content {
  display: flex;
}
.formm {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 6px;
}
nav {
  color: white;
  background-color: #0ea5e9;
  display: flex;
  justify-content: space-between;
  padding: 20px 7em;
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
