<template>
<div class="row corona-tips">
    <div class="col-md-4 corona-tip">
        <img src="/img/undraw_social_distancing_2g0u.svg" alt="Social Distancing">
        <h4>Keep 1.5m distance</h4>
        <p>Maintain at least 1.5 metres distance between yourself and others. Why? When someone coughs, sneezes, or speaks they spray small liquid droplets from their nose or mouth which may contain virus. If you are too close, you can breathe in the droplets, including the COVID-19 virus if the person has the disease.</p>
    </div>
    <div class="col-md-4 corona-tip">
        <img src="/img/undraw_wash_hands_nwl2.svg" alt="Wash your hands">
        <h4>Wash your hands</h4>
        <p>Regularly and thoroughly clean your hands with an alcohol-based hand rub or wash them with soap and water. Why? Washing your hands with soap and water or using alcohol-based hand rub kills viruses that may be on your hands.</p>
    </div>
    <div class="col-md-4 corona-tip">
        <img src="/img/undraw_at_home_octe.svg" alt="Stay at home">
        <h4>Stay at home</h4>
        <p>Stay home and self-isolate even with minor symptoms such as cough, headache, mild fever, until you recover. Have someone bring you supplies. If you need to leave your house, wear a mask to avoid infecting others. Why? Avoiding contact with others will protect them from possible COVID-19 and other viruses.</p>
    </div>

</div>
</template>

<script>
    export default {
        name: "tips"
    }
</script>

<style scoped>
    .corona-tips {
        text-align: center;
        margin-top: 40px;
    }
    img {
        max-height: 100px;
    }
    h4 {
        padding: 16px;
    }
    p {
        color: #999;
        font-size: .8rem;
    }
</style>
