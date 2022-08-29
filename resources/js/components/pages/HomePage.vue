<template>
    <div>
        <HeroComp />

        <CardSection />

        <PartnerComp />

    </div>
</template>

<script>

import HeroComp from '../sections/HeroComp.vue';
import CardSection from '../sections/CardSection.vue';
import PartnerComp from '../sections/PartnerComp.vue';

export default {
    name: "HomePage",
    components: { HeroComp, CardSection, PartnerComp }
}

</script>

<style lang="scss" scoped>

</style>
