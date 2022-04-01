<template>
  <div>
    <br>
    <HelloWorld :role="role" :changeRole="changeRole" />
  </div>
</template>

<script>
import HelloWorld from "../components/auth/HelloWorld.vue"
export default {
  name:"AuthView",
  components: { HelloWorld },
  inject:["setCurrentId"],
  props: ["role", "changeRole" ,"id"]
};
</script>

<style>
</style>