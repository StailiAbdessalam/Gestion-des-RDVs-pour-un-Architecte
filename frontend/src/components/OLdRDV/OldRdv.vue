<template>
  <div>
    <section class="container mx-auto p-6 font-mono">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <h2 id="Alluser">All User ☜(ﾟヮﾟ☜)</h2>
          <table class="w-full">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
              >
                <th id="disflex" class="px-4 py-3">Sujet</th>
                <th id="disflex" class="px-4 py-3">creneau</th>
                <th id="disflex" class="px-4 py-3">Date</th>
                <th id="disflex" class="px-4 py-3">Action</th>
                <th id="disflex" class="px-4 py-3">Chrono</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <tr v-for="rdv in list" :key="rdv.id" class="text-gray-700">
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold text-black">{{ rdv.Sujet }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-md font-semibold border">{{ rdv.creneau }}</td>

                <td class="px-4 py-3 text-sm border">{{ rdv.date }}</td>
                <td class="px-4 py-3 text-sm border">
                  <a @click="DeleteRDV(rdv.id)" class="text-[#FF0000]">Delete</a> &nbsp;
                  <a @click="getRdv(rdv.id)" class="text-[#088F8F]">Edit</a>
                </td>
                <td class="px-4 py-3 text-sm border">
                  <a class="text-[#0096FF]">{{ rdv.chrono }}</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <UpdateRDV
      class="popap"
      :idToUpdate="idToUpdate"
      @close="close"
      @getAllRDV="getAllRDV"
      v-if="!popRdvF"
    />
  </div>
</template>

<script>
import { intervalToDuration, } from "date-fns";
import UpdateRDV from "../Home/UpdateRdv.vue";
export default {
  components: { UpdateRDV },
  name: "Contact-us",
  data() {
    return {
      list: [],
      id: "",
      today: new Date(),
      RDVdt: "",
      chrono: [],
      popRdv: {},
      popRdvF: true,
      idToUpdate: ""
    };
  },
  methods: {
    close() {
      this.popRdvF = !this.popRdvF
    },
    getAllRDV() {
      this.id = localStorage.getItem("id");
      fetch(`http://localhost/BRIEFS_6/User/getAllRDV?id="${this.id}"`, {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          this.list = reponse;
          reponse.forEach((element) => {
            let eleme = element.date;
            console.log(eleme);
            const deff = intervalToDuration({ end: this.today, start: new Date(eleme) });
            element["chrono"] = deff;
          });
        });
    },
    check() {
      if (localStorage.getItem('role') === null) {
        this.$router.push('/');
      } else if (localStorage.getItem('role') === 'admin') {
        this.$router.push('/admin');
      } else {
        this.$router.push('/User');
      }
    },
    DeleteRDV(id) {
      fetch(`http://localhost/BRIEFS_6/User/remove?id="${id}"`, {
        method: "DELETE",
      }).then(() => {
        this.getAllRDV();
      });

    },
    getRdv(id) {
      this.popRdvF = !this.popRdvF;
      this.idToUpdate = id
    },
  },
  mounted() {
    this.getAllRDV();
    this.check();
  },
};
</script>

<style>
.popap {
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.359);
  position: absolute;
  top: 0%;
  left: 0%;
}
#disflex {
  text-align: center;
  color: darkslateblue;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
    "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
}
#Alluser {
  font-size: 1.5rem;
  font-weight: bold;
  font-family: "Courier New", Courier, monospace;
  color: rgb(0, 0, 0);
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>