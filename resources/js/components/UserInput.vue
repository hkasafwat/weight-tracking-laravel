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
      <select
        @change="changeWeightType"
        class="bg-white text-xl text-center text-black mx-auto p-4 mt-4 rounded shadow-md w-3/12"
        v-model="weightType"
      >
        <option value="kg">kg</option>
        <option value="lb">lb</option>
      </select>
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
      class="button-bg cursor-pointer text-2xl text-white w-full text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-6 rounded shadow-md"
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
        weight: "",
        date_value: ""
      },
      weightType: "kg"
    };
  },
  methods: {
    submitTodaysDate() {
      let d = new Date();
      let date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

      this.fields.date_value = date;
    },
    submit() {
      document.querySelector(".lds-ring").style.display = "block";
      document.querySelector("#weight-chart").style.display = "none";

      axios
        .post("/submit", {
          weight:
            this.weightType == "lb"
              ? (this.fields.weight / 2.205).toFixed(2)
              : this.fields.weight,
          date_value: this.fields.date_value
        })
        .then(res => {
          this.$root.$emit("submitted", this.weightType);
        })
        .catch(error => {
          let errorMsg = error.response.data.errors;

          if (errorMsg["weight"]) {
            this.errors.weight = errorMsg["weight"][0];
          }

          if (errorMsg["date_value"]) {
            this.errors.date_value = errorMsg["date_value"][0];
          }

          console.log(errorMsg);
        });
    },
    changeWeightType(event) {
      this.$root.$emit("weightTypeChange", event.target.value);
    }
  },
  mounted() {
    this.$root.$on("weightTypeChange", type => {
      this.weightType = type;
    });
  }
};
</script>

<style>
</style>