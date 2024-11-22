google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
const data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  [faucet, faucetData],
  [surf, surfData],
  [shortlinks,shortlinksData],
  [offerwall,offerwallData],
  [refbuysell, refbuysellData],
]);

const options = {
  title:'Earned',
  is3D:true
};

const chart = new google.visualization.PieChart(document.getElementById('myChartEarn'));
  chart.draw(data, options);
  
  //ref
  const dataref = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  [faucet, faucetDataRef],
  [surf, surfDataRef],
  [shortlinks,shortlinksDataRef],
  [offerwall,offerwallDataRef],
  [refbuysell, refbuysellDataRef],
]);

const optionsref = {
  title:'Referrals Earned',
  is3D:true
};

const chartref = new google.visualization.PieChart(document.getElementById('myChartEarnRef'));
  chartref.draw(dataref, optionsref);
}

