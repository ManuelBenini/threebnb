<template>
    <div>

        <CheckboxComp
        @apartments="startSearchApartments"
        @sponsoredApartments="startSearchSponsoredApartments"
        @apartmentsDistance="getApartmentDistances"
        @sponsoredDistance="getSponsoredDistances" />

        <div v-if="searchSuccesfull" >
            <CardSection
                :sponsoredNearbyApartments = sponsoredNearbyApartments
                :sponsored="true"
                :sponsoredDistances= sponsoredDistance
                message="in evidenza"
            />

            <CardSection
                :nearbyApartments = nearbyApartments
                :sponsored="false"
                :apartmentDistances= apartmentsDistance
                message="in base alle tue ricerche"
            />
        </div>

    </div>
</template>

<script>
import CheckboxComp from '../sections/CheckboxComp.vue';
import CardSection from '../sections/CardSection.vue';

    export default {
        name: "SearchPage",
        components: { CheckboxComp, CardSection},

        data(){
            return{
                nearbyApartments: [],
                sponsoredNearbyApartments: [],
                searchSuccesfull: false,
                apartmentsDistance: [],
                sponsoredDistance: [],
            }
        },

        methods: {
            startSearchApartments(nearbyApartments){
                this.nearbyApartments = nearbyApartments;
                this.searchSuccesfull = true;
                console.log(this.nearbyApartments, 'props nearbyapp');
            },
            startSearchSponsoredApartments(sponsoredNearbyApartments){
                this.sponsoredNearbyApartments = sponsoredNearbyApartments;
            },
            getApartmentDistances(apartmentsDistance){
                this.apartmentsDistance = apartmentsDistance;
                console.log(this.apartmentsDistance, 'props distanze app');
            },
            getSponsoredDistances(sponsoredDistance){
                this.sponsoredDistance = sponsoredDistance;
                console.log(this.sponsoredDistance, 'props distanze sponsor');
            },
        },

        mounted() {

        },

    }

</script>

<style lang="scss" scoped>

</style>
