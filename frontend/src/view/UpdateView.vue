<template>
  <div>
    <update-rdv />
  </div>
</template>

<script>
import UpdateRdv from '../components/Home/UpdateRdv.vue';
export default {
  data() {
    return {
      id: this.$route.params.id
    }
  },
  components: { UpdateRdv },
  name: "UpdateView",
};
</script>

