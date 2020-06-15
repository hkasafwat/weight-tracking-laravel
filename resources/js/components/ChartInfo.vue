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
    thisWeeksWeight(data) {
      let today = new Date();
      today = today.getDay();
      let date = 0;

      let userData = [];
      let weightArr = [];
      let dateArr = [];
      let days = [];

      data.forEach((item, i) => {
        userData[i] = [item.weight, item.inserted_at];
        weightArr[i] = item.weight;
        dateArr[i] = item.inserted_at;
      
        // console.log(new Date(dateArr[i]).getDay())
        date = new Date(dateArr[i]).getDay();
        console.log(date, weightArr[i])

        switch(date) {
          case 0:
            days[0] = weightArr[i];
            break;
          
          case 1:
            days[1] = weightArr[i];
            break;
            
          case 2:
            days[2] = weightArr[i]; 
            break;
          
          case 3:
            days[3] = weightArr[i];
            break;

          case 4:
            days[4] = weightArr[i];
            break;
          
          case 5:
            days[5] = weightArr[i];
            break;

          case 6:
            days[6] = weightArr[i];
            break;
          
          default:
        }
      })
      
      console.log(days)
      return days
    }
  },
  mounted() {
    this.weightDataRequest()
      .then(data => {
        data = this.thisWeeksWeight(data);
        return this.WeightData(data)
      })
      .then(data => {
        this.createChart("weight-chart", data)
      })

    this.thisWeeksWeight();
  }
};
</script>

<style>
</style>