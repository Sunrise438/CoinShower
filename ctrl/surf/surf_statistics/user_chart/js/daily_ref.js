//daily earning
new Chart("userref", {
  type: "line",
  data: {
    labels: xDays,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(192,192,192,0.3)",
      borderColor: "rgba(192,192,192, 0.1)",
      data: yUsers
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      //yAxes: [{ticks: {min: 0, max:0.1}}],
    }
  }
});