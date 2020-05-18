<template>
    <span><v-select v-model="country" label="name" placeholder="Choose a country to see data" :options="appdata.countries" style="width:400px; margin-right: 10px"></v-select></span>
</template>

<script>
    export default {
        name: "country-switcher",
        data() {
            return {
                country: null
            }
        },
        watch: {
            country() {
                window.location = '/country/' + this.country.code;
            }
        }
    }
</script>

<style scoped>

</style>
