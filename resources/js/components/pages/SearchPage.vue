<template>
    <div>

        <CheckboxComp
        @apartments="startSearchApartments"
        @sponsoredApartments="startSearchSponsoredApartments"
        />

        <div v-if="searchSuccesfull" >
            <CardSection
                :sponsoredApartments = "sponsoredApartments"
                :sponsored="true"
                message="in evidenza"
            />

            <CardSection
                :apartments = "apartments"
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
                apartments: [],
                sponsoredApartments: [],
                searchSuccesfull: false,
            }
        },

        methods: {
            startSearchApartments(apartments){
                this.apartments = apartments;
                this.searchSuccesfull = true;
                console.log(this.apartments, 'props nearbyapp');
            },
            startSearchSponsoredApartments(sponsoredApartments){
                this.sponsoredApartments = sponsoredApartments;
            },
        },

        mounted() {

        },

    }

</script>

<style lang="scss" scoped>

</style>
