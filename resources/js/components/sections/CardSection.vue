<!-- Questo componente gestisce la sezione in cui stamperemo le card dei singoli appartamenti -->

<template>
    <div class="custom-container">

        <h2>Appartamenti <span class="orange-text"> {{message}}</span></h2>

        <div v-if="sponsored">

            <div class="card-section">

                <CardComp
                v-for="(apartment,index) in sponsoredWithFilters"
                :key="`apartment${index}`"
                :apartment="apartment"
                :sponsored="true"
                />

                <div class="message">
                    <p v-if="!searchSuccesfull">{{researchMessage}}</p>
                    <p v-if="sponsoredApartments.length < 1 && searchSuccesfull">Nessun appartamento trovato.</p>
                </div>

            </div>

            <PaginationComp
            :pagination="paginationSpon"
            @previousPage="getPreviousPage"
            @nextPage="getNextPage" />

        </div>

        <div v-if="!sponsored">

            <div class="card-section">

                <CardComp
                v-if="apartments.length !== 0"
                v-for="(apartment,index) in apartmentsWithFilters"
                :key="`apartment${index}`"
                :apartment="apartment"
                :sponsored="false"
                />

                <div class="message">
                    <p v-if="!searchSuccesfull">{{researchMessage}}</p>
                    <p v-if="apartments.length < 1 && searchSuccesfull">Nessun appartamento trovato.</p>
                </div>

            </div>

            <PaginationComp
            :pagination="paginationApp"
            @previousPage="getPreviousPage"
            @nextPage="getNextPage" />

        </div>



    </div>
</template>

<script>

    import CardComp from '../elements/CardComp.vue';
    import PaginationComp from '../elements/PaginationComp.vue';
    import {apiUrlDatabase} from '../../data/apiConfig';

    export default {
        name: "CardSection",
        components: { CardComp, PaginationComp },

        data(){
            return{
                apiUrlDatabase,

                // Appartamenti
                apartments: [],
                apartmentsWithFilters: [],
                // apartmentDistances: [],

                paginationApp: {
                    current: 1,
                    last: null,
                },

                // Sponsorizzati
                sponsoredApartments: [],
                sponsoredWithFilters: [],
                // sponsoredDistances: [],
                paginationSpon: {
                    current: 1,
                    last: null,
                },

                updatedFilters: this.filters
            }
        },

        props:{
            message:{
                type: String,
                Required: true
            },
            researchMessage:{
                type: String,
                Required: false
            },
            sponsored:{
                type: Boolean,
                Required: true
            },
            searchSuccesfull:{
                type: Boolean,
                Required: true
            },
            filters:{
                type: Object,
                Required: true
            }
        },

        methods:{
            getPreviousPage(page){
                this.pagination.current = page
            },

            getNextPage(page){
                this.pagination.current = page
            },

            getApartmentsApi(page){
                axios.get(this.apiUrlDatabase + 'filteredApartments/' + this.filters.rooms + '/' + this.filters.beds + '/' + this.filters.radius + '/' + this.filters.position.lat + '/' + this.filters.position.lon + '?page=' + page)
                    .then(res => {
                        this.apartments = res.data

                        this.paginationApp = {
                            current: res.data.current_page,
                            last: res.data.last_page,
                        };

                        if(this.apartments.data.length === res.data.data.length){
                            this.apartmentsLoaded = true;
                            console.log(this.apartments, 'Lista degli appartamenti');
                            this.filtersOnApartments(this.apartments.data);
                        }
                    })
            },

            getSponsoredApi(page){
                axios.get(this.apiUrlDatabase + 'filteredSponsored/' + this.filters.rooms + '/' + this.filters.beds + '/' + this.filters.radius + '/' + this.filters.position.lat + '/' + this.filters.position.lon + '?page=' + page)
                    .then(res => {
                        this.sponsoredApartments = res.data

                        this.paginationSpon = {
                            current: res.data.current_page,
                            last: res.data.last_page,
                        };

                        if(this.sponsoredApartments.data.length === res.data.data.length){
                            this.sponsoredLoaded = true;
                            console.log(this.sponsoredApartments, 'Lista degli sponsorizzati');
                            this.filtersOnApartments(this.sponsoredApartments.data);
                        }
                    })
            },

            apartmentsPush(){
                this.apartments = [];
                this.sponsoredApartments = [];

                this.getApartmentsApi(1);
                this.getSponsoredApi(1);

                console.log(this.selectedServices.sort(function(a, b){return a-b}), 'servizi selezionati');
            },

            filtersOnApartments(array){
                let apartmentsWithRooms = array;

                if(this.filters.selectedServices.length !== 0){
                    apartmentsWithRooms = [];

                    apartmentsWithRooms = array.filter(apartment => {
                        let validService = 0;

                        return apartment.services.some(service => {
                            let serviceIncluded = true

                            if(this.filters.selectedServices.sort(function(a, b){return a-b}).includes(service.id)){
                                serviceIncluded = true
                                validService++
                                // console.log(validService, 'servizi validi');
                            }
                            else{
                                serviceIncluded = false
                            }

                            // console.log(this.selectedServices.length, 'lunghezza array');

                            if(serviceIncluded && validService == this.filters.selectedServices.length){
                                return true
                            }else{
                                return false
                            }

                        })
                    });

                }

                if(array == this.apartments.data){
                    this.apartmentsWithFilters = apartmentsWithRooms;
                    console.log(this.apartmentsWithFilters, 'array appartamenti filtrati restituito dal metodo')
                }else{
                    this.sponsoredWithFilters = apartmentsWithRooms;
                    console.log(this.sponsoredWithFilters, 'array sponsorizzati filtrati restituito dal metodo')
                }

            },
        },

        watch:{
            filters(){
                this.getApartmentsApi(1);
                this.getSponsoredApi(1);

                console.log(this.filters, 'CARDSECTION FILTERS');
            },

            updatedFilters(){
                this.updatedFilters = this.filters
                console.log(this.updatedFilters, 'FILTRI AGGIORNATI');
            }
        }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/front/partials/vars';

.custom-container {
    padding: 40px 0 60px 0;

    .card-section {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    @media screen and (max-width: 699px) {
        .card-section {
            justify-content: center;
        }

    }
}
</style>
