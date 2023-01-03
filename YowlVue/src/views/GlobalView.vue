<script setup>
import Global from '../components/Global.vue'
</script>

<template lang="">

  <main class="">
          <div class="">
              <Global :global="this.global" />

          </div>
   </main> 

</template>
<script>
export default {
  components: { Global },
  data() {
    return {
      id: this.$route.params.id,
      global: [],
    }
  },
  methods: {
    getGlobal() {
      var myHeaders = new Headers();
      myHeaders.append("Accept", "application/json");
      myHeaders.append("Authorization", "Basic cm9vdDo=");

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
      };

      fetch("http://localhost:8000/api/comments?categoryId[eq]="+this.id, requestOptions)
        .then(response => response.json())
        .then(result => {
          this.global.push(result.data)
          console.log(this.global) })
        .catch(error => console.log('error', error));
  }
  },
  beforeMount() {
    this.getGlobal()
  }
};

</script>