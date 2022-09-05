<template>
    <div>
        <HeroComp />

        <CardSection
            :sponsoredNearbyApartments = sponsoredApartments
            :sponsored="true"
            message="scelti per te!"
        />

        <PartnerComp />

        <AboutComp />

    </div>
</template>

<script>

import HeroComp from '../sections/HeroComp.vue';
import CardSection from '../sections/CardSection.vue';
import PartnerComp from '../sections/PartnerComp.vue';
import AboutComp from '../sections/AboutComp.vue';
import {apiUrlDatabase} from '../../data/apiConfig';

export default {
    name: "HomePage",
    components: { HeroComp, CardSection, PartnerComp, AboutComp },

    data(){
        return{
            apiUrlDatabase,
            sponsoredApartments: [],
            pagination: {
                current: 1,
                last: 10,
            },
            showPagination: false
        }
    },

    methods:{
        getSponsoredApartments(page){
            axios.get(this.apiUrlDatabase + 'sponsoredApartments/' + '?page=' + page)
                .then(res => {
                    this.sponsoredApartments = res.data.data;
                    console.log(this.sponsoredApartments, 'appartamenti sponsorizzati')

                    console.log(this.sponsoredApartments);

                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page
                    }

                    if(this.pagination.current != this.pagination.last){
                        this.showPagination = true;
                    }
                })
        },
    },

    mounted(){
        // this.getSponsoredApartments(1)
    }
}

</script>

<style lang="scss" scoped>

</style>
