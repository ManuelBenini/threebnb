<template>
    <div>

        <CheckboxComp
        @apartments="startSearchApartments"
        @sponsoredApartments="startSearchSponsoredApartments"
        @paginationApp="getPaginationApp"
        @paginationSpon="getPaginationSpon"
        />

        <div >
            <CardSection
                :sponsoredApartments = "sponsoredApartments"
                :sponsored="true"
                :searchSuccesfull="searchSuccesfull"
                :paginationSpon="paginationSpon"
                message="In evidenza"
                researchMessage="Le tue ricerche appariranno qui."
            />

            <CardSection
                :apartments = "apartments"
                :sponsored="false"
                :searchSuccesfull="searchSuccesfull"
                :paginationApp="paginationApp"
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
                paginationApp: null,
                paginationSpon: null,
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
            getPaginationApp(receivedPaginationApp){
                this.paginationApp = receivedPaginationApp;
                console.log(this.paginationApp, 'props PaginationApp');
            },
            getPaginationSpon(receivedPaginationSpon){
                this.paginationSpon = receivedPaginationSpon;
                console.log(this.paginationSpon, 'props PaginationSpon');
            },
        },

        mounted() {

        },

    }

</script>

<style lang="scss" scoped>

</style>
