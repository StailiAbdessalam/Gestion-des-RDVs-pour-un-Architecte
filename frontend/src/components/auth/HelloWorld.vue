<template>
  <div class="hello">
    <div class="container">
      <div class="logo">
        <img src="../../assets/img/logo.png" alt="">
      </div>
      <div class="form">
        <div class="formContent" v-if="form">
          <form action="" method="">
            <input type="text" placeholder="Auth By PIN" />
            <button>Submit</button>
            <a href="#" v-on:click="form = !form"
              ><br />You dont have one? <span>Creat an account</span></a
            >
          </form>
        </div>
        <div class="formContetTwo" v-if="!form">
          <form action="" method="post">
            <input type="text" placeholder="Full name" />
            <input type="number" placeholder="Age" />
            <input type="text" placeholder="Profession" />
            <button>Submit</button>

            <a href="#" v-on:click="form = !form"
              ><br />Already have an account?</a
            >
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Auth-m",
  data() {
    return {
      form: true,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
@import "../../assets/style/helloWord.css";
</style>
