<template>
    <div class="container">
       
        <ApartmentDetails/>
        <MapComp/>
    </div>
</template>

<script>
import MapComp from '../elements/MapComp.vue';
import ApartmentDetails from '../sections/ApartmentDetails.vue';

    export default {
    name: "ApartmentPage",
    components: { MapComp, ApartmentDetails}
}
</script>

<style lang="scss" scoped>



</style>
