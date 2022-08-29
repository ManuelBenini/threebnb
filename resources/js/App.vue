<template>
    <div>

        <HeaderComp/>

        <router-view></router-view>

        <FooterComp/>

    </div>
</template>

<script>

    import HeaderComp from './components/partials/HeaderComp.vue';
    import FooterComp from './components/partials/FooterComp.vue';
    import DashboardPage from './components/pages/DashboardPage.vue';

    export default {
        name: "App",
        components: { HeaderComp, FooterComp, DashboardPage }
    }

</script>

<style lang="scss">
    @import '../sass/front/style.scss';
</style>
