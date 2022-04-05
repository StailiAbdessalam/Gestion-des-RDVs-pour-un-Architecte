<template>
  <div>
    <header class="hero"></header>
    <div class="flex justify-center">
      <div class="w-3/5">
        <form
          class="bg-white p-10 rounded-lg shadow-lg min-w-full"
          @submit.prevent
        >
          <h1
            class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"
          >
            Update rendez-vous
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
              name="creneau"
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
            class="bg-sky-600 hover:bg-sky-700"
          />
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "UpdateRdv",
  data() {
    return {
      userInfo: {
        Sujet: this.data[0].id,
        date: this.data[1].id,
        creneau: this.data[2].id,
      },
    }
  },
  methods: {
    getAllRDV() {
      this.id = localStorage.getItem("id");
      fetch(`http://localhost/BRIEFS_6/user/getOne?id="${this.id}"`, {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          this.userInfo = reponse;
        });
    },
    getUser(){

      
    }
  },
};
</script>

<style>
</style>