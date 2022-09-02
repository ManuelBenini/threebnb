<template>
    <div>
        <HeroComp />

        <CardSection
            :sponsoredNearbyApartments = sponsoredApartments
            :sponsored="true"
            message="scelti per te!"
        />

        <div class="btn-container" v-if="showPagination">

            <!-- Inserire  v-if="pagination.current != 1" OPPURE :disabled-->
            <button
                :disabled = "pagination.current === 1"
                @click="getSponsoredApartments(pagination.current - 1)">
                &lt;&lt;
            </button>

            <button
                v-for="i in pagination.last"
                :key="`btn${i}`"
                @click="getSponsoredApartments(i)"
                :disabled = "pagination.current === i" >
                {{i}}
            </button>

            <!-- Inserire v-if="pagination.current != pagination.last" OPPURE :disabled-->
            <button
                :disabled = "pagination.current === pagination.last"
                @click="getSponsoredApartments(pagination.current + 1)">
                >>
            </button>

        </div>

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
                current: null,
                last: null,
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
        this.getSponsoredApartments(1)
    }
}

</script>

<style lang="scss" scoped>

</style>
