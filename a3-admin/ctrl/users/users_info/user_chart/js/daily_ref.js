//daily earning
new Chart("userref", {
  type: "line",
  data: {
    labels: xDays,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0, 0, 255, 0.3)",
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