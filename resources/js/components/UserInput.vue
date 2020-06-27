<template>
  <form
    autocomplete="nope"
    @submit.prevent="submit"
    class="outer-container max-w-sm sm:max-w-md md:max-w-lg mx-auto p-3 rounded shadow-md"
  >
    <div
      class="button-bg text-2xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md"
    >Enter Your Current Weight</div>
    <div class="flex">
      <input
        class="bg-white text-2xl text-center text-black mx-auto mt-4 p-3 rounded shadow-md w-full mr-2"
        placeholder="Enter Weight"
        name="weight"
        v-model="fields.weight"
      />
    </div>

    <div
      v-if="errors.weight"
      class="bg-white text-2xl text-bold text-red-600 text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-4 rounded shadow-md"
    >{{ errors.weight }}</div>

    <div
      class="button-bg text-2xl text-white text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-6 rounded shadow-md"
    >Enter A Date</div>
    <div class="flex flex-row">
      <button
        @click="submitTodaysDate()"
        class="button-bg text-2xl text-white w-6/12 text-center max-w-sm sm:max-w-md mx-auto px-6 py-3 mt-4 rounded shadow-md"
      >Today</button>
      <input
        type="date"
        class="bg-white text-2xl text-center text-black p-3 mx-auto ml-2 mt-4 rounded shadow-md w-6/12"
        name="date_value"
        v-model="fields.date_value"
      />
    </div>

    <div
      v-if="errors.date_value"
      class="bg-white text-2xl text-bold text-red-600 text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-4 rounded shadow-md"
    >{{ errors.date_value }}</div>

    <input
      type="submit"
      value="Submit"
      class="button-bg text-2xl text-white w-full text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-6 rounded shadow-md"
    />
  </form>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      fields: {},
      errors: {
        weight: '',
        date_value: ''
      }
    };
  },
  methods: {
    submitTodaysDate() {
      let d = new Date();
      let date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

      this.fields.date_value = date;
    },
    submit() {
      document.querySelector('.lds-ring').style.display = 'block';
      document.querySelector('#weight-chart').style.display = 'none';

      axios
        .post("/submit", this.fields)
        .then(res => {
          this.$root.$emit('submitted', true);
          console.log(res)
        })
        .catch(error => {
          let errorMsg = error.response.data.errors;

          if(errorMsg["weight"]) {
            this.errors.weight = errorMsg["weight"][0];
          } 
          
          if (errorMsg["date_value"]) {
            this.errors.date_value = errorMsg["date_value"][0];
          }

          console.log(errorMsg);
        });
    },
    reloadPage() {
      window.location.reload();
    }
  },
  mounted() {
  }
};
</script>

<style>
</style>