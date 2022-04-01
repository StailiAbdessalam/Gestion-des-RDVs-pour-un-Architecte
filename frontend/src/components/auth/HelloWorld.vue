<template>
  <div class="hello">
    <div class="container">
      <div class="bg-white p-10 rounded-lg shadow-lg w-3/5">
        <div class="formContent" v-if="form">
          <form @submit.prevent action method>
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="text"
              name="pin"
              id="PIN"
              placeholder="Auth By PIN"
              v-model="PIN"
            />
            <div class="buttons">
              <input
                type="submit"
                value="As user"
                class="hgjd bg-sky-600 hover:bg-sky-700"
                @click="checkUser()"
              />
              <input
                type="submit"
                 value="as admin"
                class="hgjd bg-sky-600 hover:bg-sky-700"
                @click="checkAdmin()"
              />
            </div>
            <a href="#" v-on:click="form = !form">
              <br />You dont have one?
              <span>Creat an account</span>
            </a>
          </form>
        </div>
        <div class="formContetTwo" v-if="!form">
          <form>
            <input type="text" v-model="registreForm.Nom" placeholder="Nom" />
            <input
              type="text"
              v-model="registreForm.Prenom"
              placeholder="Prenom"
            />  
            <input type="number" v-model="registreForm.Age" placeholder="Age" />
            <input
              type="TEXT"
              v-model="registreForm.Job"
              placeholder="profession"
            />
            <input type="text" v-model="registreForm.CIN" placeholder="CIN" />
            <input
              type="button"
              class="hgjd bg-sky-600 hover:bg-sky-700"
              value="Submit"
              @click="addUser()"
            />
            <a href="#" v-on:click="form = !form">
              <br />Already have an account?
            </a>
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
      registreForm: {
        Nom: "",
        Prenom: "",
        Age: "",
        Job: "",
        CIN: "",
      },
      PIN: "",
      Reference_unique : true,
    };
  },
  props: ["setCurrentId","role", "changeRole", "add"],
  methods: {

    showAlert(param) {
      // Use sweetalert2
      this.$swal(param);
    },
    checkAdmin() {
      fetch("http://localhost/BRIEFS_6/Admin/index", {
        method: "POST",
        body: JSON.stringify(this.PIN),
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          if (reponse == true) {
            
            this.changeRole("admin");
            this.$router.push("/Admin");
          }
        });
    },
    checkUser() {
      fetch("http://localhost/BRIEFS_6/User/index", {
        method: "POST",
        body: JSON.stringify(this.PIN),
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          if (reponse === true) {
            this.setCurrentId(Math.random().toString(32))
            this.changeRole("user");
            this.$router.push("/User");
          }
        });
    },
    addUser() {
      fetch("http://localhost/BRIEFS_6/User/register", {
        method: "POST",
        body: JSON.stringify(this.registreForm),
      })
        .then((result) => {
          return result.json();
        })
        .then((data) => {
          if (data) {
            this.showAlert(data[5]);
          }
          // this.add(data);
        });
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
.hgjd {
  color: aliceblue;
  border-radius: 3px;
}
</style>
