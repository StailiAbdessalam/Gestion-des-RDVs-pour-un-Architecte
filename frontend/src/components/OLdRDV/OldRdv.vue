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
                  <a class="text-[#088F8F]">Edit</a>
                </td>
                <td class="px-4 py-3 text-sm border">
                  <a class="text-[#0096FF]">{{rdv.chrono}}</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { intervalToDuration, } from "date-fns";

export default {
  name: "Contact-us",
  data() {
    return {
      list: [],
      id: "",
      today: new Date(),
      RDVdt: "",
      chrono: [],

    };
  },
  methods: {
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
            const deff = intervalToDuration({end:this.today,start:new Date (eleme)});
            // console.log(deff);
            element["chrono"] = deff;
            
          });

        });
    },
    // updateChrono() {
    //   this.list.forEach((v, i) => {
    //     this.list[i] = {...v, chrono: intervalToDuration({end: this.today, start:addHours(new Date(), -1)})};
    //   });


    // },
    DeleteRDV(id) {
      fetch(`http://localhost/BRIEFS_6/User/remove?id="${id}"`, {
        method: "DELETE",
      })
        .then(() => {
          // return result.json();
          this.getAllRDV();
        })
      // .then((reponse) => {
      //   this.Rdvuser = reponse;
      // });
    },
  },
  mounted() {
    // this.updateChrono();
    // setInterval(() => {
    //   this.updateChrono();
    // }, 1000);
    this.getAllRDV();
  }
};
</script>

<style>
</style>