//daily earning
new Chart("userrefearn", {
  type: "line",
  data: {
    labels: xValuesRef,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(192,192,192,0.3)",
      borderColor: "rgba(192,192,192, 0.1)",
      data: yValuesRef
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      //yAxes: [{ticks: {min: 0, max:0.1}}],
    }
  }
});
