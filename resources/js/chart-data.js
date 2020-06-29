const weight = (days, dateFrom, dateTo, weightType) =>  {

  return {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [
        { // one line graph
          label: `Weight (Week: ${dateFrom.replace(/-/g, '/')} - ${dateTo.replace(/-/g, '/')})`,
          data: [...days],
          backgroundColor: [
            'rgba(174,55,134,.5)',
            'rgba(174,55,134,.5)',
            'rgba(174,55,134,.5)',
            'rgba(174,55,134,.5)',
            'rgba(174,55,134,.5)',
            'rgba(174,55,134,.5)',
            'rgba(174,55,134,.5)',
            'rgba(174,55,134,.5)'
          ],
          borderColor: [
            '#af1e7f',
            '#af1e7f',
            '#af1e7f',
            '#af1e7f',
            '#af1e7f',
            '#af1e7f',
            '#af1e7f',
            '#af1e7f',
          ],
          borderWidth: 4
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      responsive: true,
      lineTension: 1,
      scales: {
        yAxes: [{
          stacked: true,
          ticks: {
            beginAtZero: true,
            padding: 10,
          }
        }],
        ticks: {
          padding: 50
        }
      },
      tooltips: {
        mode: 'nearest',
        callbacks: {
          label: function(title, data) {
            let newTitle = `  ${title["value"]} ${weightType} `;
            let label = data.datasets[title.datasetIndex].label;

            label = newTitle;
            return label
          }
        }
      }
    }
  }
}

export default weight;
