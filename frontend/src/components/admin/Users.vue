<template>
  <div>
    <section class="container mx-auto p-6 font-mono">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <h1 class="pb-6 text-xl font-bold">TOUS MES CLIENTS</h1>

          <table class="w-full">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
              >
                <th class="px-4 py-3">id</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Age</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">CIN</th>
                <th class="px-4 py-3">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <tr v-for="user in Alluser" :key="user.id" class="text-gray-700">
                <td class="px-4 py-3 text-ms font-semibold border">{{ user.id }}</td>

                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                      <img
                        class="object-cover w-full h-full rounded-full"
                        src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                        alt
                        loading="lazy"
                      />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold text-black">{{ user.Nom }} {{ user.Prenom }}</p>
                      <!-- <p class="text-xs text-gray-600">{{user.Job}}</p> -->
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ user.Age }}</td>
                <td class="px-4 py-3 text-xs border">
                  <h3>{{ user.Job }}</h3>
                  <h3>{{ user.id }}</h3>
                  <!-- <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >profession</span>-->
                </td>
                <td class="px-4 py-3 text-sm border">{{ user.CIN }}</td>
                <td class="px-4 py-3 text-sm border">
                  <a class="dlete" @click="deleteUser(user.id)">Delete</a>
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
  name: "All-users",
  data() {
    return {
      Alluser: true,
    };
  },
  methods: {
    GetAllUser() {
      fetch("http://localhost/BRIEFS_6/Admin/UserAll", {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          this.Alluser = reponse;

        });
    },

    deleteUser(id) {
      fetch(
        `http://localhost/BRIEFS_6/admin/DELETEUSER?id=${id}`,
        {
          method: "DELETE"
        }
      )
        .then(() => {
          this.GetAllUser();
        })
    },
    check(){
      if(localStorage.getItem('role') === null){
        this.$router.push('/');
      }else if(localStorage.getItem('role') === 'admin'){
        this.$router.push('/admin');
      }else {
        this.$router.push('/User');
      }
    }
  }, 
  mounted() {
  this.check();
    this.GetAllUser();
  }

};
</script>

<style>
.dlete{
  cursor: pointer;
}
</style>