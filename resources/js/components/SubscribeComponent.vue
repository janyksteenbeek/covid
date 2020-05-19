<template>
    <button href="" class="btn btn-outline-success my-2 my-sm-0" type="button" @click="openModal">Subscribe to updates</button>
</template>

<script>
    export default {
        name: "SubscribeComponent",
        props: {
            countryCode: {
                type: String,
                required: true
            }
        },
        methods: {
            openModal() {
                this.$swal.fire({
                    title: 'Subscribe to ' + this.countryCode,
                    input: 'email',
                    showCancelButton: true,
                    confirmButtonText: 'Subscribe to updates',
                    showLoaderOnConfirm: true,
                    preConfirm: (email) => {
                        return axios.post('/api/subscribe', {country: this.countryCode, email: email})
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.value) {
                        this.$swal.fire({
                            title: `${result.value.login}'s avatar`,
                            imageUrl: result.value.avatar_url
                        })
                    }
                })

            }
        }
    }
</script>

<style scoped>

</style>
