<template>
    <div class="card">
        <div class="card-body">
            <h3>{{ displayedCount | number }}</h3>
            <div class="text-muted">
                {{ label }}
                <div class="badge float-right" v-if="changedCount" :class="{ 'badge-success': changedCount > 0, 'badge-danger': changedCount < 0 }">
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
                required: true
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
