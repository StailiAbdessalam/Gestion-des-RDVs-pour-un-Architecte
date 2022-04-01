<template>
  <div>
    <Navigation :role="role" />
    <router-view :changeRole="changeRole" :role="role" :setCurrentId="setCurrentId" :id="id" />
  </div>
</template>

<script>
import Navigation from "./components/Navigation.vue";
export default {
  name: "App",
  components: { Navigation },
  data() {
    return {
      role: "",
      id:""
    }
  },
  methods: {
    setCurrentId(id){
      this.id = id
    },
    changeRole(newRole) {
      this.role = newRole;
    }
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
}


</style>
