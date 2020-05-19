<template>
    <div class="card my-4 shadow-sm border-0">
        <div class="card-body">
            <h3>{{ displayedCount | number }}</h3>
            <div class="text-muted">
                {{ label }}
                <div class="badge float-right" v-if="changedCount" :class="{ 'badge-warning': changedCount > 0, 'badge-success': changedCount < 0 }">
                    <span v-if="changedCount > 1">+</span>
                    {{ changedCount }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "statistic-box",
        props: {
            label: {
                type: String,
                required: true
            },
            count: {
                type: Number,
                required: true
            },
            changedCount: {
                type: Number,
                required: false
            }

        },
        data() {
            return {
                displayedCount: 0
            }
        },
        created() {
            const startValue = parseInt(this.count / 100 * 75);
            const startTimestamp = null;

            const step = (timestamp) => {
                const progress = Math.min((timestamp - startTimestamp) / 1500, 1);
                this.displayedCount = Math.floor(progress * (this.count - startValue) + startValue);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }
    }
</script>

<style scoped>

</style>
