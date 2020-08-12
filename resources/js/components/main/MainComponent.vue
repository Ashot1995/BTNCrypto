<template>
    <div class="hello" ref="chartdiv">
    </div>
</template>

<script>
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);


export default {
    name: 'MainComponent',
    data() {
        return {
            info: []
        }
    },
    mounted() {
        axios
            .get('http://localhost:8000/api/v1/get')
            .then((response) => {
                let res = Object.entries(response.data.bpi);
                let chart = am4core.create(this.$refs.chartdiv, am4charts.XYChart);

                chart.paddingRight = 20;

                let data = [];
                for (let i = 0; i < res.length; i++) {
                    data.push({date: new Date(res[i][0]), value: res[i][1]});
                }

                chart.data = data;

                let dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.renderer.grid.template.location = 0;

                let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.tooltip.disabled = true;
                valueAxis.renderer.minWidth = 35;

                let series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.dateX = "date";
                series.dataFields.valueY = "value";

                series.tooltipText = "{valueY.value}";
                chart.cursor = new am4charts.XYCursor();

                let scrollbarX = new am4charts.XYChartScrollbar();
                scrollbarX.series.push(series);
                chart.scrollbarX = scrollbarX;

                this.chart = chart;
            })
    },

    beforeDestroy() {
        if (this.chart) {
            this.chart.dispose();
        }
    }
}
</script>

<style scoped>
.hello {
    width: 100%;
    height: 500px;
}
</style>
