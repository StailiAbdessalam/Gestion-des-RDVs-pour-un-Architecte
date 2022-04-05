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
              <tr v-for="RDVone in Rdvuser" :key="RDVone.id" class="text-gray-700">
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold text-black">{{ RDVone.Sujet }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-md font-semibold border">{{ RDVone.creneau }}</td>

                <td class="px-4 py-3 text-sm border">{{ RDVone.date }}</td>
                <td class="px-4 py-3 text-sm border">
                  <a @click="DeleteRDV(RDVone.id)" class="text-[#FF0000]">Delete</a> &nbsp;
                  <a class="text-[#088F8F]">Edit</a>
                </td>
                <td class="px-4 py-3 text-sm border">
                  <a class="text-[#0096FF]">{{chrono}}</a>
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
import moment from "moment";
export default {
  name: "Contact-us",
  data() {
    return {
      Rdvuser: {},
      id: "",
      chrono:moment().format('MMMM Do YYYY, h:mm:ss a'),
      RDVdt: "",
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
          this.Rdvuser = reponse;
        });
    },
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
    this.getAllRDV();
  }
};
</script>

<style>
</style>