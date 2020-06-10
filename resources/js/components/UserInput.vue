<template>
  <form
    @submit.prevent="submit"
    class="outer-container max-w-sm sm:max-w-md mx-auto p-3 mt-4 border rounded shadow-md"
  >
    <div
      class="blue-bg text-xl text-left text-white max-w-sm sm:max-w-md mx-auto px-6 py-3 border rounded shadow-md"
    >Enter Your Current Weight</div>
    <div class="flex">
      <input
        class="bg-white text-xl text-center text-black mx-auto mt-4 p-3 border rounded shadow-md w-9/12 mr-2"
        placeholder="Enter Weight"
        name="weight"
        v-model="fields.weight"
        required
      />
      <select
        class="bg-white text-xl text-black mx-auto p-3 mt-4 border rounded shadow-md w-3/12"
        placeholder="kg"
        name="weight_type"
      >
        <option value="kg">kg</option>
        <option value="lb">lb</option>
      </select>
    </div>
    <div
      class="blue-bg text-xl text-white text-left max-w-sm sm:max-w-md mx-auto px-6 py-3 mt-6 border rounded shadow-md"
    >Enter A Date</div>
    <div class="flex flex-col">
      <input
        type="date"
        class="bg-white text-xl text-center text-black p-3 mx-auto mt-4 border rounded shadow-md w-full"
        name="date_value"
        v-model="fields.date_value"
        required
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