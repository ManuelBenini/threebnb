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
                :searchSuccesfull="searchSuccesfull"
                message="In evidenza"
                researchMessage="Le tue ricerche appariranno qui."
            />

            <CardSection
                :apartments = "apartments"
                :sponsored="false"
                :searchSuccesfull="searchSuccesfull"
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
                console.log(this.apartments, 'props appartamenti');
            },
            startSearchSponsoredApartments(sponsoredApartments){
                this.sponsoredApartments = sponsoredApartments;
                console.log(this.sponsoredApartments, 'props sponsorizzate');
            },
        },

        mounted() {

        },

    }

</script>

<style lang="scss" scoped>

</style>
