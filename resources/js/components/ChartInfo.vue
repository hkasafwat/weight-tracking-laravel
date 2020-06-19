<template>
  <div class="outer-container max-w-sm sm:max-w-md mx-auto mt-4 p-3 border rounded shadow-md">
    <div class="flex flex-row">
      <button @click="getGraph(count--)" class="mx-auto">back</button>
      <button @click="getGraph(count++)" class="mx-auto">forward</button>
    </div>
    <div
      class="bg-white text-black max-w-sm sm:max-w-md mx-auto p-3 h-full border rounded shadow-md"
    >
      <canvas id="weight-chart" class="mx-auto"></canvas>
    </div>
    <select
      class="bg-white text-xl text-black mx-auto p-3 mt-4 border rounded shadow-md w-4/12"
      placeholder="kg"
      name="weight_type"
    >
      <option value="kg">kg</option>
      <option value="lb">lb</option>
    </select>
  </div>
</template>

<script>
import axios from "axios";
import Chart from "chart.js";
import WeightData from "../chart-data";
import weight from "../chart-data";

export default {
  data() {
    return {
      WeightData,
      count: 0
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
    getWeightByWeek(week = 0) {
      return axios.get("/thisWeek", {
        params: {
          week: week
        }
      }).then(res => {
          return res.data;
      }).catch(err => {
        console.log(err)
      });
    },
    getGraph(count) {
      this.getWeightByWeek(this.count)
      .then(data => {
        let weightArr = [];
        let days = [];

        data[0].forEach(function(item, i) {
          weightArr[i] = item.weight;
          let date = new Date(item.inserted_at).getDay();

          switch (date) {
            case 1:
              days[0] = weightArr[i];
              break;

            case 2:
              days[1] = weightArr[i];
              break;

            case 3:
              days[2] = weightArr[i];
              break;

            case 4:
              days[3] = weightArr[i];
              break;

            case 5:
              days[4] = weightArr[i];
              break;

            case 6:
              days[5] = weightArr[i];
              break;

            case 0:
              days[6] = weightArr[i];
              break;
          }
        });

        return [days, data[1], data[2]];
      })
      .then(data => this.WeightData(data))
      .then(data => this.createChart("weight-chart", data));
    }
  },
  mounted() {
    this.getGraph(this.count)
  }
};
</script>

<style>
</style>