<template>
    <div>

        <CheckboxComp
        @apartments="startSearchApartments"
        @sponsoredApartments="startSearchSponsoredApartments" />

        <div v-if="searchSuccesfull" >
            <CardSection
                :sponsoredNearbyApartments = sponsoredNearbyApartments
                :sponsored="true"
                message="in evidenza"
            />

            <CardSection
                :nearbyApartments = nearbyApartments
                :sponsored="false"
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
            searchSuccesfull: false
        }
    },

    methods: {
        startSearchApartments(nearbyApartments){
            this.nearbyApartments = nearbyApartments;
            console.log(nearbyApartments, 'comp genitore');
            this.searchSuccesfull = true;
        },
        startSearchSponsoredApartments(sponsoredNearbyApartments){
            this.sponsoredNearbyApartments = sponsoredNearbyApartments;
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
