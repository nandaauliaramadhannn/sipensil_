$(document).ready(function () {
	$.getJSON('http://127.0.0.1:8000/statisik-data-dinas-kb', function (response) {
		$(".loading").hide();
		let pie = {
			chart: {
				type: 'pie'
			},
			subtitle: {
				text: "Total Data : " + response.totalData
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: true,
						format: '{point.name}: {point.y:f}'
					}
				},
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					showInLegend: true
				}
			},

			tooltip: {
				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b><br/>'
			},

			series: [
				{
					name: "Jumlah",
					colorByPoint: true,
					shadow: 1,
					border: 1,
					data: []
				}
			]
		}

		let bar = {
			chart: {
				type: 'bar',
			},
			subtitle: {
				text: "Total Data: " + response.totalData
			},
			xAxis: {
				type: 'category',
				title: {
					text: null
				},
				min: 0,
				max: 4,
				scrollbar: {
					enabled: true
				},
				tickLength: 0
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Jumlah Data',
					align: 'high'
				}
			},
			plotOptions: {
				bar: {
					dataLabels: {
						enabled: true
					}
				}
			},
			legend: {
				enabled: false
			},
			credits: {
				enabled: false
			},
			series: [{
				name: 'Jumlah',
				data: []
			}]
		};

		let column = {
			chart: {
				type: 'column'
			},
			subtitle: {
				text: 'Total Data : ' + response.totalData
			},
			xAxis: {
				type: 'category'
			},
			legend: {
				enabled: false
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Jumlah Data'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> {point.y}</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},

			plotOptions: {
				series: {
					borderWidth: 0,
					dataLabels: {
						enabled: true,
						format: '{point.y}'
					}
				}
			},

			series: [{
				name: "",
				colorByPoint: true,
				data: []
			}
			]
		};

		//kecamatan
		let chart_kecamatan = Highcharts.chart('chart-kecamatan', pie);
		chart_kecamatan.title.textSetter("Grafik kecamatan ");
		chart_kecamatan.series[0].setData(response.kecamatan);

		let chart_kecamatan_bar = Highcharts.chart('chart-kecamatan-bar', column);
		chart_kecamatan_bar.title.textSetter("Grafik kecamatan");
		chart_kecamatan_bar.series[0].setData(response.kecamatan);

		let chart_desa = Highcharts.chart('chart-desa', pie);
		chart_pukesmas.title.textSetter("Grafik desa");
		chart_pukesmas.series[0].setData(response.desa);

		let chart_desa_bar = Highcharts.chart('chart-desa-bar', column);
		chart_desa_bar.title.textSetter("Grafik Golongan desa");
		chart_desa_bar.series[0].setData(response.desa);



	});
});