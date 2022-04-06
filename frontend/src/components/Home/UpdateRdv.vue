<template>
  <div>
    <p>{{ idToUpdate }}</p>
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
              v-model="popRdv.Sujet"
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
              v-model="popRdv.date"
              :min="new Date().toISOString().substr(0, 10)"
              id="date"
              @change="checkhour"
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
              v-model="popRdv.creneau"
            >
              <option disabled selected>
                Choisissez l'heure à laquelle vous aimeriez vous rencontrer
              </option>
              <option v-for="heur in hours" :key="heur">{{ heur }}</option>
            </select>
          </div>
          <div class="flex gap-4 justify-center">
            <input
              type="submit"
              value="Confirmer"
              @click="UpdateRDV(popRdv.id)"
              class="bg-sky-600 hover:bg-sky-700 p-2"
            />
            <input
              type="submit"
              value="Cancel"
              @click="$emit('close')"
              class="bg-red-600 hover:bg-red-700 text-white-400/0 p-2"
            />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "UpdateRdv",
  props: {
    idToUpdate: Number,
  },
  data() {
    return {
      popRdv: {
        id_utilisateur: localStorage.getItem("id"),
        Sujet: "",
        date: "",
        creneau: "",
      },
      hours: [],
    };
  },
  methods: {
    checkhour() {
      fetch(
        `http://localhost/BRIEFS_6/User/selectInDate?date="${this.popRdv.date}"`,
        {
          method: "GET",
        }
      )
        .then((result) => {
          return result.json();
        })
        .then((data) => {
          this.hours = data;
        });
    },
    UpdateRDV(id) {
      fetch(`http://localhost/BRIEFS_6/user/updateAppointment?id=${id}`, {
        method: "PUT",
        body: JSON.stringify(this.popRdv),
      })
        .then((result) => {
          // console.log(this.popRdv);
          return result.json();
        })
        .then((data) => {
          if (data) {
            this.$emit("close");
            this.$emit("getAllRDV");
          }
        });
    },
  },
  mounted() {
    // this.id = localStorage.getItem("id");
    fetch(`http://localhost/BRIEFS_6/user/getOne?id="${this.idToUpdate}"`, {
      method: "GET",
    })
      .then((result) => result.json())
      .then((res) => {
        this.popRdv = res;

        // console.log(res);
      });
    // console.log("fskqd");
  },
};
</script>

<style>
</style>