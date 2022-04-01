<template>
  <div>
    <Navigation :role="role" />
    <router-view :changeRole="changeRole" :role="role" />
  </div>
</template>

<script>
import Navigation from "./components/Navigation.vue";
import {computed} from 'vue'
export default {
  name: "App",
  provide() {
    return {
      setCurrentId:this.setCurrentId,
      id: computed(() => this.id),
    }
  },
  components: { Navigation },
  data() {
    return {
      role: "",
      id: ""
    }
  },
  methods: {
     setCurrentId(id) {
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
