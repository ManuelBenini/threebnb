<template>
    <div>
        <HeroComp />

        <CardSection />

        <PartnerComp />

        <AboutComp />

    </div>
</template>

<script>

import HeroComp from '../sections/HeroComp.vue';
import CardSection from '../sections/CardSection.vue';
import PartnerComp from '../sections/PartnerComp.vue';
import AboutComp from '../sections/AboutComp.vue';

export default {
    name: "HomePage",
    components: { HeroComp, CardSection, PartnerComp, AboutComp }
}

</script>

<style lang="scss" scoped>

</style>
