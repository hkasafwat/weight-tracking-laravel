<template>
  <div class="outer-container max-w-sm sm:max-w-md mx-auto mt-4 p-3 border rounded shadow-md">
    <div
      class="bg-white text-black max-w-sm sm:max-w-md mx-auto p-3 h-full border rounded shadow-md"
    >
      <canvas id="weight-chart" class="mx-auto"></canvas>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Chart from "chart.js";
import WeightData from "../chart-data";

export default {
  data() {
    return {
      WeightData
    };
  },
  components: {},
  methods: {
    createChart(chardId, chartData) {
      const ctx = document.getElementById(chardId);
      new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options
      });
    },
    weightDataRequest() {
      return axios.get('/weights').then((res) => {
        return res.data
      })
    },
    thisWeeksWeight() {
      let today = new Date();
      today = today.getDay();

      console.log(today)
    }
  },
  mounted() {
    this.weightDataRequest()
      .then(data => this.WeightData(data))
      .then(data => this.createChart("weight-chart", data))

    this.thisWeeksWeight();
  }
};
</script>

<style>
</style>