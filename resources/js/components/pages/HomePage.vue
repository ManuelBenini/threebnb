<template>
    <div>
        <HeroComp />

        <CardSection />


    </div>
</template>

<script>
import HeroComp from '../sections/HeroComp.vue';
import CardSection from '../sections/CardSection.vue';
    export default {
    name: "HomePage",
    components: { HeroComp, CardSection }
}
</script>

<style lang="scss" scoped>

</style>
