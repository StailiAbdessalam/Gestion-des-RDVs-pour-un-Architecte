<template>
  <div>
    <Navigation />
    <router-view />
  </div>
</template>

<script>
import Navigation from "./components/Navigation.vue";
import {computed} from "vue";
export default {
  name: "App",
  components: { Navigation },
  provide(){
    return {
      role: computed(() => this.role),
      resetRole: this.resetRole,
      changeRole: this.changeRole,
    }
  },
  data() {
    return {
      role: "",
      id: ""
    }
  },
  mounted() {
    this.role = localStorage.getItem("role") ?? "";
  },
  methods: {
    resetRole(){
      this.role = "";
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
