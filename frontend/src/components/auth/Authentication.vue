<template>
  <div class="hello">
    <div class="container">
      <div id="popLogin" class="bg-white p-10 rounded-lg shadow-lg w-3/5">
        <div class="formContent" v-if="form">
          <form @submit.prevent action method>
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="text"
              name="pin"
              id="PIN"
              placeholder="Auth By PIN"
              v-model="PIN"
              required
            />
            <div class="buttons">
              <input
                type="submit"
                value="As user"
                class="hgjd bg-sky-600 hover:bg-sky-700"
                @click="login('user')"
              />
              <input
                type="submit"
                value="as admin"
                class="hgjd bg-sky-600 hover:bg-sky-700"
                @click="login('admin')"
              />
            </div>
            <a href="#" v-on:click="form = !form">
              <br />You dont have one?
              <span class="Newconte">Creat an account</span>
            </a>
          </form>
        </div>
        <div class="formContetTwo" v-if="!form">
          <form>
            <input type="text" v-model="registreForm.Nom" placeholder="Nom"  />
            <input type="text" v-model="registreForm.Prenom" placeholder="Prenom" />
            <input type="number" v-model="registreForm.Age" placeholder="Age" />
            <input type="TEXT" v-model="registreForm.Job" placeholder="profession" />
            <input type="text" v-model="registreForm.CIN" placeholder="CIN" />
            <div class="flex-butt">
              <input
                type="button"
                class="hgjd bg-sky-600 hover:bg-sky-700"
                value="Submit"
                @click="register"
              />
              <a id="cntdija" href="#" v-on:click="form = !form">
                <br />
                <span class="Newconte Newconte--abd">Already have an account?</span>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  name: "Auth-m",
  inject: ["role", "resetRole", "changeRole"],
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
      Reference_unique: true,
    };
  },
  props: ["add"],
  methods: {
    showAlert(param) {
      this.$swal("Here is your reference id: " + param);
    },
    login(role) {
      fetch(`http://localhost/BRIEFS_6/${role}/index`, {
        method: "POST",
        body: JSON.stringify(this.PIN),
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          if (!reponse) {
            return;
          }
          localStorage.setItem("role", role);
          localStorage.setItem("id", reponse.id);
          this.changeRole(role);
          this.$router.push(`/${role}`);
        });
    },
    // checkAdmin() {
    //   fetch("http://localhost/BRIEFS_6/Admin/index", {
    //     method: "POST",
    //     body: JSON.stringify(this.PIN),
    //   })
    //     .then((result) => {
    //       return result.json();
    //     })
    //     .then((reponse) => {
    //       if (reponse == !false) {
    //         localStorage.setItem("role", "admin");
    //         this.$router.push("/Admin");
    //       }
    //     });
    // },
    // checkUser() {
    //   fetch("http://localhost/BRIEFS_6/User/index", {
    //     method: "POST",
    //     body: JSON.stringify(this.PIN),
    //   })
    //     .then((result) => {
    //       return result.json();
    //     })
    //     .then((reponse) => {
    //       if (reponse) {
    //         localStorage.setItem("id", reponse.id);
    //         localStorage.setItem("role", "user");
    //         this.$router.push("/User");
    //       }
    //     });
    // },
    register() {
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
            this.form = !this.form
          }
        });
    },
  },
};
</script>
<style scoped>
@import "../../assets/style/helloWord.css";
.hello {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 80vh;
  position: relative;
  background-repeat: no-repeat;
  background-size: cover;
}
#PIN {
  height: 50px;
}
.Newconte {
  font-weight: bold;
  color: #00bcd4;
}
.abd {
  display: flex;
}
#cntdija {
  display: flex;
}
.hgjd {
  color: aliceblue;
  border-radius: 3px;
  width: 120px;
}
#popLogin {
  height: 400px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.flex-butt {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 20px;
}
</style>
