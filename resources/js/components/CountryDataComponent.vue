<template>
    <div v-if="statistics">
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
    </div>
</template>

<script>
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
