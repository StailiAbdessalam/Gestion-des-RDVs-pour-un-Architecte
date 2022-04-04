<template lang="">
  <nav>
    <div class="logo">
      <img src="../assets/img/logo.png" alt="" />
    </div>
    <div class="nav-content">
      <router-link v-if="!role" class="nav-item" to="/"
        >Authentication</router-link
      >
      <router-link  class="nav-item" to="/home"
        >Home</router-link
      >
      <template v-if="role === 'user'">
        <router-link class="nav-item" to="/User/RDV">Rendez-vous</router-link>
        <router-link class="nav-item" to="/User"
          >Tous mes rendez-vous</router-link
        >
      </template>
      <router-link v-if="role === 'admin'" class="nav-item" to="/Admin">Admin</router-link>
      <router-link v-if="role === 'admin'" class="nav-item" to="/ALLRDV">RDV</router-link>
      <!-- <router-link  class="nav-item" to="/"> -->
      <!-- <form   action="\" > -->
      <!-- </form> -->
      
      <!-- </router-link> -->
    </div>
    <div class="shrink-0 flex items-center gap-2">
      <!-- <img
        class="h-14 w-14 object-cover rounded-full"
        src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"
        alt="Current profile photo"
      /> -->
      <!-- abdessalam staili -->
            <a id="hah" href="\" v-if="role" @click="logout()"  class="nav-item">logout</a>

    </div>
  </nav>
</template>
<script>
export default {
  name: "nav-item",
  // props: ["role"],
  data() {
    return {
      role: "",
    };
  },
  mounted() {
    this.rolll();
  },
  methods: {
    logout() {
      localStorage.removeItem("role");
      this.$router.push("/");
    },
    rolll() {
      this.role = localStorage.getItem("role");
      console.log(this.role);
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
