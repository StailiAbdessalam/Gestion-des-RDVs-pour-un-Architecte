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
  props: ["role", "changeRole"]
};
</script>

<style>
</style>