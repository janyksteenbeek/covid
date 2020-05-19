<script>
    import { Line } from 'vue-chartjs'

    export default {
        name: 'line-chart',
        extends: Line,
        props: ['chartData', 'options'],
        mounted () {
            this.renderChart(this.chartData, this.options)
        }
    }
</script>

<style>
</style>
