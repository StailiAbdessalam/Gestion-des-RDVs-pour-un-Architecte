<template>
  <div>
    <br>
    <AuthC />
  </div>
</template>

<script>
import AuthC from "../components/auth/AutoC.vue"
export default {
  name:"AuthView",
  components: { AuthC },
  inject:["setCurrentId"],
  props: ["role", "changeRole" ,"id"]
};
</script>

<style>
</style>