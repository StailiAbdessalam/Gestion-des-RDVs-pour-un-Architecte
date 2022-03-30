<template>
  <div class="hello">
    <div class="container">

      <div class="form">
        <div class="formContent" v-if="form">
          <form action="" method="">
            <input type="text" placeholder="Auth By PIN" />
            <button class="bg-sky-600 hover:bg-sky-700">As user</button>
            <button class="bg-sky-600 hover:bg-sky-700">As Admin</button>
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
            <button class="bg-sky-600 hover:bg-sky-700">Submit</button>

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
.hello {
  background-image: url(../../assets/img/pexels-thirdman-5582599.jpg);
  height: 100vh;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
