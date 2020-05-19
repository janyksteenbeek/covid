<template>
    <div v-if="statistics.all.length > 0">
        <div class="row">
            <div class="col-md-4">
                <statistic-box label="Cases" :count="statistics.latest.total_cases" :changed-count="statistics.latest.new_cases"></statistic-box>
            </div>
            <div class="col-md-4">
                <statistic-box label="Deceased" :count="statistics.latest.total_deaths" :changed-count="statistics.latest.new_deaths"></statistic-box>
            </div>
            <div class="col-md-4">
                <statistic-box label="Recovered patients" :count="statistics.latest.total_recoveries"></statistic-box>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <line-chart :chart-data="casesChartData"></line-chart>
            </div>
            <div class="col-md-6">
                <line-chart :chart-data="deceasedChartData"></line-chart>
            </div>
        </div>
    </div>
    <div v-else class="text-center">
        <h2 class="text-muted py-4">Sorry - no data for this country (yet).</h2>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        name: "country-data",
        props: {
            countryCode: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                statistics: null,
                country: null
            }
        },
        created() {
            this.fetchData();
        },
        computed: {
            casesChartData() {
                return {
                    labels: this.statistics.all.map(item => {
                        return moment(item.date).format('DD-MM-YYYY');
                    }),
                    datasets: [
                        {
                            label: 'Cases',
                            backgroundColor: '#f87979',
                            data: this.statistics.all.map(item => {
                                return item.total_cases;
                            })
                        }
                    ]
                }
            },
            deceasedChartData() {
                return {
                    labels: this.statistics.all.map(item => {
                        return moment(item.date).format('DD-MM-YYYY');
                    }),
                    datasets: [
                        {
                            label: 'Deceased',
                            backgroundColor: '#f87979',
                            data: this.statistics.all.map(item => {
                                return item.total_deaths;
                            })
                        }
                    ]
                }
            }
        },
        methods: {
            fetchData() {
                axios.get('/api/country/' + this.countryCode).then(res => {
                    this.statistics = res.data.statistics;
                    this.country = res.data.country;
                })
            }
        }
    }
</script>

<style scoped>

</style>
