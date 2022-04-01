<template>
  <div>
    {{id}}
    <section class="container mx-auto p-6 font-mono">
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
              >
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Chrono</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Date</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <tr class="text-gray-700">
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold text-black">sujet</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-ms font-semibold border">ch7al ba9i we9t</td>
                <td class="px-4 py-3 text-xs border">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >Acceptable</span>
                </td>
                <td class="px-4 py-3 text-sm border">6/4/2000</td>
              </tr>
              <tr class="text-gray-700">
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold text-black">sujet</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-md font-semibold border">ch7al ba9i we9t</td>
                <td class="px-4 py-3 text-xs border">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-sm"
                  >Pending</span>
                </td>
                <td class="px-4 py-3 text-sm border">6/10/2020</td>
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
  props: ["id"],
  data() {
    return {
      AllRDV: true,
    }
  },
  mounted() {
  },
  methods: {
    getAllRDV() {
      fetch("http://localhost/BRIEFS_6/User/getAllRDV?id=''", {
        method: "GET",
      }).then(result => { return result.json() })
        .then(reponse => {
          this.AllRDV = reponse
          console.log(reponse);
        })
    }
  },
};
</script>

<style>
</style>