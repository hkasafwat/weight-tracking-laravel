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
import weight from '../chart-data';

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
    thisWeeksWeight(data) {
        return axios.get('/thisWeek').then((res) => {
          return res.data
        })
    }
  },
  mounted() {
    // this.weightDataRequest()
    //   .then(data => {
    //     data = this.thisWeeksWeight(data);
    //     return this.WeightData(data)
    //   })
    //   .then(data => {
    //     this.createChart("weight-chart", data)
    //   })

    this.thisWeeksWeight()
      .then(data => {
        let weightArray = [];

        data.forEach((element, i) => {
          weightArray[i] = element["weight"];
        });

        return weightArray;
      })
      .then(data => this.WeightData(data))
      .then(data => this.createChart("weight-chart", data))
  }
};
</script>

<style>
</style>