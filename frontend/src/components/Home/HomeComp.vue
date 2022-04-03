<template>
  <div>
    <header class="hero">
      <h1 class="text-center text-3xl mb-6 text-gray-600 font-bold font-sans">
        OFREZ-VOUS LE LUXE DE L'ARCHITECTURE
      </h1>
    </header>
    <div class="flex justify-center">
      <div class="w-3/5">
        <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" @submit.prevent>
          <h1
            class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"
          >
            Prendre un rendez-vous
          </h1>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >Sujet :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="textarea"
              name="Sujet"
              v-model="RDVform.Sujet"
              id="Sujet"
              placeholder="Sujet"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3 text-md"
              for="date"
              >Date :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="date"
              name="date"
              v-model="RDVform.date"
              :min="new Date().toISOString().substr(0, 10)"
              id="date"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3 text-md"
              for="date"
              >Créneaux:</label
            >
            <select
              class="
                select select-bordered
                w-full
                bg-gray-100
                px-4
                py-2
                rounded-lg
                focus:outline-none
                mb-4
              "
              v-model="RDVform.creneau"
            >
              <option disabled selected>
                Choisissez l'heure à laquelle vous aimeriez vous rencontrer
              </option>
              <option>10 h à 10:30h</option>
              <option>11 h à 11:30h</option>
              <option>14 h à 14:30h</option>
              <option>15 h à 15:30h</option>
              <option>16 h à 16:30h</option>
            </select>
          </div>
          <input
            type="submit"
            value="Confirmer"
            @click="addAppointment()"
            class="bg-sky-600 hover:bg-sky-700"
          />
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "hafidH",
  data() {
    return {
      RDVform: {
        id_utilisateur: localStorage.getItem("id"),
        Sujet: "",
        date: "",
        creneau: "",
      },
    };
  },
  methods: {
    addAppointment() {
      fetch("http://localhost/BRIEFS_6/user/addAppointment", {
        method: "POST",
        body: JSON.stringify(this.RDVform),
      })
        .then((result) => {
          return result.json();
          
        })
        .then((data) => {
          if(data){
            this.$router.push("/User");
          }
        });
    },
  },
};
</script>

<style>
</style>