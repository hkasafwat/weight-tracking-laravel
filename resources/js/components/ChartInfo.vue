<template>
  <div class="outer-container max-w-sm sm:max-w-md mx-auto mt-4 p-3 border rounded shadow-md">
    <div
      class="bg-white text-black max-w-sm sm:max-w-md mx-auto p-3 h-full border rounded shadow-md"
    >
      <canvas id="planet-chart" class="mx-auto"></canvas>
    </div>
  </div>
</template>

<script>
import Chart from "chart.js";
import planetChartData from "../chart-data";

export default {
  data() {
    return {
      planetChartData
    };
  },
  components: {},
  methods: {
    createChart(chardId, chartData) {
      /* eslint-disable no-unused-vars */
      const ctx = document.getElementById(chardId);
      const myChart = new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options
      });
      /* eslint-enable no-unused-vars */
    }
  },
  mounted() {
    this.createChart("planet-chart", this.planetChartData);
  }
};
</script>

<style>
</style>