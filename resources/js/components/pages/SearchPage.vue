<template>
    <div>

        <CheckboxComp
        @apartments="startSearchApartments"
        @sponsoredApartments="startSearchSponsoredApartments"
        />

        <div >
            <CardSection
                :sponsoredApartments = "sponsoredApartments"
                :sponsored="true"
                :sponsoredDistances= sponsoredDistance
                researchMessage="Le tue ricerche appariranno qui."
            />

            <CardSection
                :apartments = "apartments"
                :sponsored="false"
                message="in base alle tue ricerche"
                researchMessage="Le tue ricerche appariranno qui."
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
