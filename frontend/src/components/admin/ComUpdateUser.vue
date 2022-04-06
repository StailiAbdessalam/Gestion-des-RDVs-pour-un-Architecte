<template>
  <div>
    <p>{{ UserIDupdate }}</p>
    <div class="flex justify-center">
      <div class="formContetTwo w-3/5">
        <form
          class="bg-white p-10 rounded-lg shadow-lg min-w-full"
          @submit.prevent
        >
          <h1
            class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"
          >
            Update User info
          </h1>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >Nom :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="text"
              v-model="UpdateUserForm.Nom"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >Prenom :</label
            >
            <input
              type="text"
              v-model="UpdateUserForm.Prenom"
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >Age :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="number"
              min="22"
              v-model="UpdateUserForm.Age"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3 mb-4"
              for="Sujet"
              >profession :</label
            >
            <input
              type="text"
              v-model="UpdateUserForm.Job"
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
            />
          </div>
          <div>
            <label
              class="text-left text-gray-800 font-semibold block my-3"
              for="Sujet"
              >CIN :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="text"
              v-model="UpdateUserForm.CIN"
            />
          </div>
          <div class="flex gap-4 justify-center">
            <input
              type="button"
              class="bg-sky-600 hover:bg-sky-700 p-2"
              value="Submit"
              @click="UpdateUser()"
            />
            <input
              type="button"
              class="bg-red-600 hover:bg-red-700 text-white-400/0 p-2"
              value="Close"
              @click="$emit('close')"
            />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ComUpdateUser",
  props: {
    UserIDupdate: Number,
  },
  data() {
    return {
      UpdateUserForm: {
        Nom: "",
        Prenom: "",
        job: "",
        Age: "",
        CIN: "",
      },
    };
  },
  methods: {
    UpdateUser() {
      fetch(`http://localhost/BRIEFS_6/admin/updateUser`, {
        method: "PUT",
        body: JSON.stringify(this.UpdateUserForm),
      })
        .then((result) => result.json())
        .then((data) => {
          if (data) {
            this.$forceUpdate();
            this.$emit("close");
            this.$emit("getOneUser");
          }
        });
    },
  },
  mounted() {
    fetch(
      `http://localhost/BRIEFS_6/admin/getOneUser?id="${this.UserIDupdate}"`
    )
      .then((result) => result.json())
      .then((res) => {
        this.UpdateUserForm = res;
      });
  },
};
</script>

<style>
</style>