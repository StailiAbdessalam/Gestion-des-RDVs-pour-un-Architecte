<template>
  <div class="hello">
    <div class="container">
      <div class="bg-white p-10 rounded-lg shadow-lg w-3/5">
        <div class="formContent" v-if="form">
          <form @submit.prevent="" action="" method="">
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="text"
              name="pin"
              id="PIN"
              placeholder="Auth By PIN"
              v-model="PIN"
            />
            <div class="buttons">
              <button
                class="bg-sky-600 hover:bg-sky-700"
                @click="changeRole('user')"
              >
                As user
              </button>
              <button
                class="bg-sky-600 hover:bg-sky-700"
                @click="changeRole('admin')"
              >
                As Admin
              </button>
            </div>
            <a href="#" v-on:click="form = !form"
              ><br />You dont have one? <span>Creat an account</span></a
            >
          </form>
        </div>
        <div class="formContetTwo" v-if="!form">
          <form>
            <input type="text" placeholder="Full name" />
            <input type="number" placeholder="Age" />
            <input type="text" placeholder="Profession" />
            <input type="text" placeholder="CIN" />
            <input
              type="button"
              class="bg-sky-600 hover:bg-sky-700"
              value="Submit"
              @click="showAlert()"
            />
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
      PIN: "",
    };
  },
  props: ["role", "changeRole"],
  methods: {
    showAlert() {
      // Use sweetalert2
      this.$swal("Hello Vue world!!!");
    },

  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
@import "../../assets/style/helloWord.css";
.hello {
  /* background-image: url(../../assets/img/pexels-thirdman-5582599.jpg); */
  height: 100vh;
  position: relative;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
