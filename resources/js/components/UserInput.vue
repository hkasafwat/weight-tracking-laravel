<template>
  <form autocomplete="nope"
    @submit.prevent="submit"
    class="outer-container max-w-sm sm:max-w-md mx-auto p-3 mt-4 border rounded shadow-md"
  >
    <div
      class="blue-bg text-xl text-left text-white max-w-sm sm:max-w-md mx-auto px-6 py-3 border rounded shadow-md"
    >Enter Your Current Weight</div>
    <div class="flex">
      <input
        class="bg-white text-xl text-center text-black mx-auto mt-4 p-3 border rounded shadow-md w-full mr-2"
        placeholder="Enter Weight"
        name="weight"
        v-model="fields.weight"
        required
      />
    </div>
    <div
      class="blue-bg text-xl text-white text-left max-w-sm sm:max-w-md mx-auto px-6 py-3 mt-6 border rounded shadow-md"
    >Enter A Date</div>
    <div class="flex flex-row">
      <button @click="submitTodaysDate(el)" class="blue-bg text-xl text-white w-6/12 text-center max-w-sm sm:max-w-md mx-auto px-6 py-3 mt-4 border rounded shadow-md">Today</button>
      <input
        type="date"
        class="bg-white text-xl text-center text-black p-3 mx-auto ml-2 mt-4 border rounded shadow-md w-6/12"
        name="date_value"
        v-model="fields.date_value"
      />
    </div>

    <input
      type="submit"
      value="Submit"
      class="blue-bg text-xl text-white w-full text-center max-w-sm sm:max-w-md mx-auto px-6 py-3 mt-6 border rounded shadow-md"
    />
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      fields: {},
      errors: {},
    }
  },
  methods: {
    submitTodaysDate() {
      let d = new Date();
      let date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();

      this.fields.date_value = date;
    },
    submit() {
      console.log(this.fields)
      axios.post('/submit', this.fields).then(res => {
        console.log(res)
        console.log(this.fields)
      }).catch(error => {
        console.log(error)
      })
    }
  },
  mounted() {
    // console.log(this.fields)
  }
};
</script>

<style>
</style>