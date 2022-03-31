<template>
  <div>
    <header class="hero">
      <h1 class="text-center text-3xl mb-6 text-gray-600 font-bold font-sans">
        OFREZ-VOUS LE LUXE DE L'ARCHITECTURE
      </h1>
    </header>
    <div class="flex justify-center">
      <div class="w-3/5">
        <form class="bg-white p-10 rounded-lg shadow-lg min-w-full">
          <h1
            class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"
          >
            Prendre un rendez-vous
          </h1>
          <div>
            <label class="text-left text-gray-800 font-semibold block my-3" for="Sujet"
              >Sujet :</label
            >
            <input
              class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
              type="textarea"
              name="Sujet"
              v-model="sujet"
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
              v-model="date"
              :min="new Date().toISOString().substr(0, 10)"
              id="date"
            />
          </div>
          <div class="flex flex-col">
            <label
              class="text-left text-gray-800 font-semibold block my-3 text-md"
              for="date"
              >Créneaux :
            </label>
            <label class="inline-flex items-center mt-3">
              <input
                type="radio"
                name="Creneaux"
                class="form-checkbox h-5 w-5 text-gray-600"
              /><span class="ml-2 text-gray-700">10 h à 10:30h</span>
            </label>
            <label class="inline-flex items-center mt-3">
              <input
                type="radio"
                name="Creneaux"
                class="form-checkbox h-5 w-5 text-red-600"
              /><span class="ml-2 text-gray-700">11 h à 11:30h</span>
            </label>
            <label class="inline-flex items-center mt-3">
              <input
                type="radio"
                name="Creneaux"
                class="form-checkbox h-5 w-5 text-red-600"
              /><span class="ml-2 text-gray-700">14 h à 14:30h</span>
            </label>
            <label class="inline-flex items-center mt-3">
              <input
                type="radio"
                name="Creneaux"
                class="form-checkbox h-5 w-5 text-red-600"
              /><span class="ml-2 text-gray-700">15 h à 15:30h</span>
            </label>
            <label class="inline-flex items-center mt-3">
              <input
                type="radio"
                name="Creneaux"
                class="form-checkbox h-5 w-5 text-red-600"
              /><span class="ml-2 text-gray-700 text-center"
                >16 h à 16:30h</span
              >
            </label>
          </div>
          <button type="submit" class="bg-sky-600 hover:bg-sky-700">
            Confirmer
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "hafidH",
};
</script>

<style>
</style>