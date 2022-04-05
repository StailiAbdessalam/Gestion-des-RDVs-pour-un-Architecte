<template>
  <div>
    <section class="container mx-auto p-6 font-mono">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr
                class="
                  text-md
                  font-semibold
                  tracking-wide
                  text-left text-gray-900
                  bg-gray-100
                  uppercase
                  border-b border-gray-600
                "
              >
                <th class="px-4 py-3">Sujet</th>
                <th class="px-4 py-3">creneau</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Action</th>
                <th class="px-4 py-3">download</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <!-- <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
              >Acceptable</span>-->
              <tr
                v-for="RDVone in Rdvuser"
                :key="RDVone.id"
                class="text-gray-700"
              >
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold text-black">{{ RDVone.Sujet }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-md font-semibold border">
                  {{ RDVone.creneau }}
                </td>

                <td class="px-4 py-3 text-sm border">{{ RDVone.date }}</td>
                <td class="px-4 py-3 text-sm border">
                  <a
                    @click="DeleteRDV(RDVone.id)"
                    class="text-[#FF0000] hover:cusor-pointer"
                    >Delete</a
                  >
                  &nbsp;
                  <!-- <router-link :to="{name:'Update' , params:{id:RDVone.id}}"  class="text-[#088F8F]">Edit</router-link> -->
                  <a @click="getRdv(RDVone.id)" class="text-[#088F8F]">Edit</a>
                </td>
                <td class="px-4 py-3 text-sm border">
                  <a class="text-[#0096FF]">download</a>
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
export default {
  name: "Contact-us",
  data() {
    return {
      Rdvuser: {},
      id: "",
      popRdv: {},
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
      fetch(`http://localhost/BRIEFS_6/user/getOne?id="${id}"`, {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((result) => {
          this.popRdv = result;
          // console.log(this.popRdv);
        });
    },
  },
  mounted() {
    this.getAllRDV();
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