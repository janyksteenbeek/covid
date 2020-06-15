<template>
    <div v-if="statistics && statistics.length > 0">
        <div class="row">
            <div class="col-md-4">
                <statistic-box label="Cases" :count="latest.total_cases" :changed-count="latest.new_cases"></statistic-box>
            </div>
            <div class="col-md-4">
                <statistic-box label="Deceased" :count="latest.total_deaths" :changed-count="latest.new_deaths"></statistic-box>
            </div>
            <div class="col-md-4">
                <statistic-box label="Recovered patients" :count="latest.total_recoveries"></statistic-box>
            </div>
        </div>
        <div class="text-right text-muted py-2">Last updated at {{ lastUpdated }}</div>

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
    import gql from 'graphql-tag';

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
            latest() {
                return this.statistics.slice(-1)[0];
            },
            lastUpdated() {
                return moment(this.latest.date).format('DD-MM-YYYY');
            },
            casesChartData() {
                return {
                    labels: this.statistics.map(item => {
                        return moment(item.date).format('DD-MM-YYYY');
                    }),
                    datasets: [
                        {
                            label: 'Cases',
                            backgroundColor: '#f87979',
                            data: this.statistics.map(item => {
                                return item.total_cases;
                            })
                        }
                    ]
                }
            },
            deceasedChartData() {
                return {
                    labels: this.statistics.map(item => {
                        return moment(item.date).format('DD-MM-YYYY');
                    }),
                    datasets: [
                        {
                            label: 'Deceased',
                            backgroundColor: '#f87979',
                            data: this.statistics.map(item => {
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
                    // this.statistics = res.data.statistics;
                    this.country = res.data.country;
                })
            }
        },
        apollo: {
            statistics: {
                query: gql`query Statistics($country: String!) {
                statistics(country_code: $country, orderBy:{ field: DATE, order:ASC }) {
                    date,
                    new_cases,
                    new_deaths,
                    total_cases,
                    total_deaths,
                    total_recoveries
                  }}`,
                variables() {
                    return {
                        country: this.countryCode
                    }
                }
            }

        }
    }
</script>

<style scoped>

</style>
