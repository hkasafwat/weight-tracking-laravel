import axios from "axios";

const weight = (data) => axios.get('/weights').then((res) => {
  

  // console.log(weightArr)

  return {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [
        { // one line graph
          label: 'Weight (Week)',
          data: [...data],
          backgroundColor: [
            'rgba(54,73,93,.5)', // Blue
            'rgba(54,73,93,.5)',
            'rgba(54,73,93,.5)',
            'rgba(54,73,93,.5)',
            'rgba(54,73,93,.5)',
            'rgba(54,73,93,.5)',
            'rgba(54,73,93,.5)',
            'rgba(54,73,93,.5)'
          ],
          borderColor: [
            '#36495d',
            '#36495d',
            '#36495d',
            '#36495d',
            '#36495d',
            '#36495d',
            '#36495d',
            '#36495d',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true,
      lineTension: 1,
      scales: {
        yAxes: [{
          stacked: true,
          ticks: {
            beginAtZero: true,
            padding: 25,
          }
        }]
      }
    }
  }
})

export default weight;
