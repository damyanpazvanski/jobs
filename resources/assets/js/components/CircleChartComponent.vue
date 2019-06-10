<template>
    <div v-if="values.length">
        <div class="chart mt-2 mb-2" :style="{'background': 'conic-gradient(#00ff00 ' + this.values[0].percent + '%, #26c6da 0'}"></div>
        <ul class="key mt-5">
            <li v-for="(value, index) in values">
                <strong class="percent first-chart-part" v-if="index === 0">{{ value.percent }}%</strong>
                <strong class="percent second-chart-part" v-if="index === 1">{{ value.percent }}%</strong>
                <span class="choice">{{ value.title }}</span>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props: ['values']
    }
</script>
