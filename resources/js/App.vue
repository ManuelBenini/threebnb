<template>
    <div>

        <HeaderComp/>

        <router-view></router-view>

        <FooterComp/>

        <CheckboxComp />

    </div>
</template>

<script>

    import HeaderComp from './components/partials/HeaderComp.vue';
    import FooterComp from './components/partials/FooterComp.vue';
import CheckboxComp from './components/sections/CheckboxComp.vue';

    export default {
        name: "App",
        components: { HeaderComp, FooterComp, CheckboxComp }
    }

</script>

<style lang="scss">
    @import '../sass/front/style.scss';
</style>
