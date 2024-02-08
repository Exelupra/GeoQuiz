<script>

export default {
  data() {
    return {
      series: null
    }
  },
  mounted() {
    this.$apigeolo.get('creerPartie/1').then((response) => {
      this.series = response.data;
    })
  },
  methods: {
    print(id) {
      this.$apigeolo.get('creerPartie/1').then((response) => {
        console.log(response.data);
      })
    }
  }

}

</script>

<template>
<h1>Page de test</h1>
  <div>
    {{ series }}
    <button @click="print()">Print</button>
  </div>
</template>

<style scoped>

</style>