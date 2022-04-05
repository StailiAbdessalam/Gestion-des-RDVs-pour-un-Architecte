<template>
  <div>
    <section class="container mx-auto p-6 font-mono">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
              >
                <th class="px-4 py-3">Sujet</th>
                <th class="px-4 py-3">creneau</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Action</th>
                <th class="px-4 py-3">Chrono</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <!-- <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
              >Acceptable</span>-->
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
            // console.log(deff);
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
    // updateChrono() {
    //   this.list.forEach((v, i) => {
    //     this.list[i] = {...v, chrono: intervalToDuration({end: this.today, start:addHours(new Date(), -1)})};
    //   });


    // },

    DeleteRDV(id) {
      fetch(`http://localhost/BRIEFS_6/User/remove?id="${id}"`, {
        method: "DELETE",
      }).then(() => {
        // return result.json();
        this.getAllRDV();
        // console.log(this.popRdv);
      });
      // .then((reponse) => {
      //   this.Rdvuser = reponse;
      // });
    },
    getRdv(id) {
      // this.id = localStorage.getItem("id");
      // fetch(`http://localhost/BRIEFS_6/user/getOne?id="${id}"`, {
      //   method: "GET",
      // })
      //   .then((result) => {
      //     return result.json();
      //   })
      //   .then((result) => {
      //     this.popRdv = result;

      //     // console.log(this.popRdv);
      //   });
      this.popRdvF = !this.popRdvF;
      this.idToUpdate = id
      // console.log(id)
    },
  },
  mounted() {
    // this.updateChrono();
    // setInterval(() => {
    //   this.updateChrono();
    // }, 1000);
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
</style>