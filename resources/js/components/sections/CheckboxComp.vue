<template>
    <div>

        <h1 class="text-center">Cerca il tuo BnB ideale</h1>

        <!-- SEARCH APP -->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center search-app">
                        <form action="">
                            <input class="input-city" type="text" placeholder="Inserisci la tua destinazione..." v-model="address" @keyup="addressSearchApi()">
                            <input v-model="rooms" class="input-numb" type="number" min="1" max="999" placeholder="N° stanze">
                            <input v-model="beds" class="input-numb" type="number" min="1" max="999" placeholder="N° letti">
                            <div class="distance">
                                <label class="text-center" for="distance">Distanza (km)</label>
                                <input v-model="radius" class="input-km" type="number" placeholder="Distanza max (km)">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /SEARCH APP -->


        <!-- CHECKBOX AREA -->
        <div class="container-fluid checkbox-area">
            <div class="row">
                <div class="col">


                    <div class="checkbox flex-wrap">

                        <div class="col-6 service-list-1">

                            <form action="inserire-percorso">
                                <label v-for="(service, index) in servicesList1" :key="`service${index}`" >
                                    <div class="card-service">

                                        <ul>
                                            <li :class="(service.click ? 'selected' : 'no-selected')" id="#service">
                                                <input @click="service.click = !service.click" class="mr-3" type="checkbox" :value="service.id" v-model="selectedServices">
                                                <i :class="service.icon"></i>
                                                <p>{{ service.name }}</p>
                                            </li>
                                        </ul>

                                    </div>

                                </label>
                            </form>

                        </div>

                        <div class="col-6 service-list-2">

                            <form action="inserire-percorso">
                                <label v-for="(service, index) in servicesList2" :key="`service${index}`" >
                                    <div class="card-service">

                                        <ul>
                                            <li :class="(service.click ? 'selected' : 'no-selected')" id="#service">
                                                <input @click="service.click = !service.click" class="mr-3" type="checkbox" :value="service.id" v-model="selectedServices">
                                                <i :class="service.icon"></i>
                                                <p>{{ service.name }}</p>
                                            </li>
                                        </ul>

                                    </div>
                                </label>
                            </form>
                        </div>

                    </div>

                    <div class="search">

                        <ButtonComp
                            :disabled="address.length < 3"
                            callToAction="Ricerca"
                            stile="arancione"
                            @click.native="apartmentEmit()"
                        />

                    </div>

                </div>

            </div>
        </div>
        <!-- /CHECKBOX AREA -->
    </div>
</template>

<script>
    import ButtonComp from '../elements/ButtonComp.vue';
    import CardSection from './CardSection.vue';
    import {apiUrlTomTom, apiUrlDatabase} from '../../data/apiConfig';

    export default {
        name: "CheckboxComp",

        data() {
            return {
                // ApiUrl e coordinate
                apiUrlTomTom,
                apiUrlDatabase,
                tomtomKey: 'laZ0bbuHjk1Qf0HdMzIuCx3fPRECKycn',
                position: {
                    lat: 0,
                    lon: 0
                },

                // Appartamenti
                apartments: [],
                apartmentsWithFilters: [],
                // apartmentDistances: [],

                // Sponsorizzati
                sponsoredApartments: [],
                sponsoredWithFilters: [],
                // sponsoredDistances: [],

                // Filtri ricerca
                radius: 20,
                address: '',
                rooms: 0,
                beds: 0,
                selectedServices: [],

                // Servizi
                servicesList1: [],
                servicesList2: []
            };
        },

        watch:{
            apartments(){
                this.$emit('apartments', this.apartmentsWithFilters);
            },

            sponsoredApartments(){
                this.$emit('sponsoredApartments', this.sponsoredWithFilters);
            },

        },

        methods: {
            addressSearchApi(){
                axios.get(this.apiUrlTomTom + this.address + '.json' + '?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=' + this.tomtomKey)
                    .then(res => {
                        this.position.lat = res.data.results[0].position.lat;
                        this.position.lon = res.data.results[0].position.lon;

                        console.log(res.data.results[0].position, 'coordinate tomtom');
                    })
            },

            getApartmentsApi(){
                axios.get(this.apiUrlDatabase + 'filteredApartments/' + this.rooms + '/' + this.beds + '/' + this.radius + '/' + this.position.lat + '/' + this.position.lon)
                    .then(res => {
                        this.apartments = res.data

                        if(this.apartments.length === res.data.length){
                            this.apartmentsLoaded = true;
                            console.log(this.apartments, 'Lista degli appartamenti');
                            this.filtersOnApartments(this.apartments);
                        }

                    })
            },

            getSponsoredApi(){
                axios.get(this.apiUrlDatabase + 'filteredSponsored/' + this.rooms + '/' + this.beds + '/' + this.radius + '/' + this.position.lat + '/' + this.position.lon)
                    .then(res => {
                        this.sponsoredApartments = res.data

                        if(this.sponsoredApartments.length === res.data.length){
                            this.sponsoredLoaded = true;
                            console.log(this.sponsoredApartments, 'Lista degli sponsorizzati');
                            this.filtersOnApartments(this.sponsoredApartments);
                        }
                    })
            },

            getServices(){
                this.firstServicesList(1, this.servicesList1);
                this.firstServicesList(2, this.servicesList2);
            },

            firstServicesList(page, array){
                axios.get(this.apiUrlDatabase + 'services/?page=' + page)
                    .then(res => {
                        res.data.data.forEach(service => {
                            service ={
                                id: service.id,
                                name: service.name,
                                icon: service.icon,
                                click: false
                            }
                            array.push(service)
                        });
                    })
            },

            apartmentsPush(){
                this.apartments = [];
                this.sponsoredApartments = [];

                this.getApartmentsApi();
                this.getSponsoredApi();
            },

            filtersOnApartments(array){
                let apartmentsWithRooms = array;

                if(this.selectedServices.length !== 0){
                    apartmentsWithRooms = [];

                    apartmentsWithRooms = array.filter(apartment => {
                        let validService = 0;

                        return apartment.services.some(service => {
                            let serviceIncluded = true

                            if(this.selectedServices.sort(function(a, b){return a-b}).includes(service.id)){
                                serviceIncluded = true
                                validService++
                                // console.log(validService, 'servizi validi');
                            }
                            else{
                                serviceIncluded = false
                            }

                            // console.log(this.selectedServices.length, 'lunghezza array');

                            if(serviceIncluded && validService == this.selectedServices.length){
                                return true
                            }else{
                                return false
                            }

                        })
                    });

                }

                if(array == this.apartments){
                    this.apartmentsWithFilters = apartmentsWithRooms;
                    console.log(this.apartmentsWithFilters, 'array appartamenti filtrati restituito dal metodo')
                }else{
                    this.sponsoredWithFilters = apartmentsWithRooms;
                    console.log(this.sponsoredWithFilters, 'array sponsorizzati filtrati restituito dal metodo')
                }

            },

            // EMIT
            apartmentEmit(){
                this.apartmentsPush();
                console.log(this.selectedServices.sort(function(a, b){return a-b}), 'servizi selezionati');
            },
        },

        mounted(){
            this.getServices();
        },

        components: { ButtonComp, CardSection }
    }
</script>

<style lang="scss" scoped>

    @import '../../../sass/front/partials/vars';

    h1{
        font-size: 48px;
        margin-top: 20px;
    }

    label {
        margin: 0;
    }

    .col-6 {
        padding: 0px 10px;
    }

    // SEARCH APP

    .search-app form {
        border: 1px solid #979797;
        padding: 12px 12px;
        border-radius: 35px;
    }

    .search-app input{
        padding: 0px 10px;
        width: 300px;
        border: none;

        &:focus {
            outline: none;
        }
    }

    .search-app button {
        background-color: $colore-primario;
        padding: 10px 10px;
        padding: 8px 13px;
        border: none;
        border-radius: 50%;

        i {
            color: #FFFFFF;
        }
    }

    .distance {
        display: flex;
        flex-direction: column;
    }

    form .input-city, form .input-numb, form .input-km {
        margin: auto;
    }

    form .input-city, form .input-numb {
        border-right: 1px solid #979797;
        align-content: center;
    }

    form .input-numb {
        width: 110px;
        text-align: center;

    }

    form .input-km {
        width: 170px;
        text-align: center;
    }


    // /SEARCH APP


    // CHECKBOX AREA

    ul {
        padding: 0;
        margin: 0px 10px;
    }

    li {
        text-align: center;
        text-decoration: none;
        text-transform: none;
        color: #979797;
        transition: color .2s ease-in-out;
        font-size: 18px;
        border-bottom: 2px solid transparent;
        cursor: pointer;

        &:hover {
            transition: color .2s ease-in-out;
            text-decoration: none;
            -webkit-transition: color .2s ease-in-out;
            -moz-transition: color .2s ease-in-out;
            color: #000000;
        }
    }

    p {
        margin-bottom: 2px;
    }

    input[type=checkbox] {
        transform: scale(1.5);
    }

    .card-service {
        width: 110px;
    }

    .checkbox-area{
        padding-bottom: 60px;
    }

    .checkbox{
        width: 50%;
        margin: 0 auto;
        margin-top: 40px;
        margin-bottom: 10px;
    }

    .checkbox, form, .search {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .service-list-2 {
        justify-content: space-between;
    }

    .selected {
        color: #000000;
        transition: .2s ease-in-out;
        border-bottom: 2px solid #979797
    }

    .no-selected {
        color: #979797;
    }

    // /CHECKBOX AREA


    // MEDIA QUERY

    @media screen and (max-width: 1681px) {
        .service-list-1 li {
            margin: 0 4px;
        }
    }

    @media screen and (max-width: 1486px) {
        .card-service {
            width: 108px;
        }
    }

    @media screen and (max-width: 745px) {
        .checkbox{
            width: 70%;
            margin: 0 auto;
            margin-top: 40px;
            margin-bottom: 10px;
        }

        .card-service {
            width: 135px;
        }

        form .input-city {
            width: 100%;
            text-align: center;
            border-right: none;
        }

        form .input-numb {
            width: 50%;
        }

        form .input-km {
            width: 100%;
        }
    }

    @media screen and (max-width: 500px){
        h1 {
            margin: 0 40px;
        }
    }

    @media screen and (max-width: 465px){
        form .input-city {
            border-right: none;
        }
    }

    @media screen and (max-width: 455px){
        form .input-city, form .input-numb, form .input-km {
            border-right: none;
            text-align: center;
        }

        form .input-numb {
            border-right: 1px solid #979797;
        }
        form .input-km {
            width: 100%;
        }
    }

    @media screen and (max-width: 415px){
        form input {
            flex-direction: column;
        }
    }

    @media screen and (max-width: 400px) {
        h1 {
            margin: 0 40px;
        }

        form .input-city, form .input-numb, form .input-km {
            margin: auto;
            padding: 5px 0px;
            border-right: none;
            width: 250px;
        }

        form .input-city, form .input-numb {
            border-bottom: 1px solid #979797;
        }

        .search-app form {
            flex-direction: column;
        }
    }

    // /MEDIA QUERY

</style>
