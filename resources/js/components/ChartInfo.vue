<template>
  <div class="outer-container max-w-sm sm:max-w-md md:max-w-lg mx-auto p-3 mt-4 rounded shadow-md">
    <div class="flex flex-row">
      <button
        @click="getGraph(count--)"
        class="button-bg text-xl text-white w-4/12 text-center max-w-sm sm:max-w-md mr-auto px-4 py-2 mb-3 rounded shadow-md"
      >Back</button>
      <select
        @change="changeWeightType"
        class="bg-white text-xl text-center text-black mx-auto p-4 mb-3 rounded shadow-md w-3/12"
        v-model="GraphWeightType"
      >
        <option value="kg">kg</option>
        <option value="lb">lb</option>
      </select>
      <button
        @click="getGraph(count++)"
        class="button-bg text-xl text-white w-4/12 text-center max-w-sm sm:max-w-md ml-auto px-4 py-2 mb-3 rounded shadow-md"
      >Forward</button>
    </div>
    <div
      class="bg-white text-black max-w-sm sm:max-w-md md:max-w-lg mx-auto p-3 h-full rounded shadow-md"
    >
      <div class="lds-ring mx-auto">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
      <div class="chart-container" style="position: relative; height: 16rem">
        <canvas id="weight-chart" class="mx-auto hidden"></canvas>
      </div>
    </div>
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
      count: 0,
      GraphWeightType: "kg"
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
      return axios
        .get("/thisWeek", {
          params: {
            week: week
          }
        })
        .then(res => {
          return res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getGraph(count) {
      document.querySelector(".lds-ring").style.display = "block";
      document.querySelector("#weight-chart").style.display = "none";

      this.getWeightByWeek(this.count).then(data => {
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

        document.querySelector(".lds-ring").style.display = "none";
        document.querySelector("#weight-chart").style.display = "block";

        if (this.GraphWeightType == "lb") {
          days.forEach((el, i) => {
            days[i] = (el * 2.205).toFixed(2);
          })
        }

        return this.createChart(
          "weight-chart",
          this.WeightData(days, data[1], data[2], this.GraphWeightType)
        );
      });
    },
    changeWeightType(event) {
      this.$root.$emit("weightTypeChange", event.target.value);
    }
  },
  mounted() {
    this.getGraph(this.count);

    this.$root.$on(["submitted", "weightTypeChange"], type => {
      this.GraphWeightType = type;
      this.getGraph(this.count);
    });

    // this.$root.$on("weightTypeChange", type => {
    //   this.GraphWeightType = type;
    //   this.getGraph(this.count);
    // });
  }
};
</script>

<style>
.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid gray;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: gray transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>