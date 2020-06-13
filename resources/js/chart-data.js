import axios from "axios";



const weight = () => axios.get('/weights').then((res) => {
  let labels = res.data;
  let userData = [];
  let date;

  labels.forEach((item, i) => {
    // console.log(i)

    date = item.inserted_at;
    userData[i] = item.weight;

    // console.log(date)
    // console.log(userData)
  })

  console.log(labels)

  return {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [
        { // one line graph
          label: 'Weight (Week)',
          data: [userData[0], userData[1], userData[2], userData[3], userData[4], userData[5], userData[6]],
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

  // return weight
})

console.log(weight())


export default weight();
