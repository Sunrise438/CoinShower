//daily earning
new Chart("userearning", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(192,192,192,0.3)",
      borderColor: "rgba(192,192,192, 0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      //yAxes: [{ticks: {min: 0, max:0.1}}],
    }
  }
});