<template>
  <div>
    <br>
    <HelloWorld :role="role" :changeRole="changeRole" :setCurrentId="setCurrentId"  />
  </div>
</template>

<script>
import HelloWorld from "../components/auth/HelloWorld.vue"
export default {
  name:"AuthView",
  components: { HelloWorld },
  props: ["role", "changeRole" ,"id", "setCurrentId"]
};
</script>

<style>
</style>