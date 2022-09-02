<template>
    <div>

        <CheckboxComp />

    </div>
</template>

<script>
import CheckboxComp from '../sections/CheckboxComp.vue';
import DashboardPage from './DashboardPage.vue';
    export default {
    name: "SearchPage",
    components: { CheckboxComp, DashboardPage }
}
</script>

<style lang="scss" scoped>

</style>
