<template>
    <div class="container">
       
        <ApartmentDetails/>
         <MapComp/>
        <SponsorshipsComp/>
    </div>
</template>

<script>
import MapComp from '../elements/MapComp.vue';
import ApartmentDetails from '../sections/ApartmentDetails.vue';
import SponsorshipsComp from '../sections/SponsorshipsComp.vue';
    export default {
    name: "ApartmentPage",
    components: { MapComp, ApartmentDetails, SponsorshipsComp }
}
</script>

<style lang="scss" scoped>



</style>
