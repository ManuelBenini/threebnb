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
            sponsoredApartments: []
        }
    },

    methods:{
        getSponsoredApartments(){
            axios.get(this.apiUrlDatabase + 'sponsoredApartments')
                .then(res => {
                    this.sponsoredApartments = res.data;
                    console.log(this.sponsoredApartments, 'appartamenti sponsorizzati')
                })
        },
    },

    mounted(){
        this.getSponsoredApartments()
    }
}

</script>

<style lang="scss" scoped>

</style>
