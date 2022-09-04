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
                            @click.native="apartmentEmit(); sponsoredApartmentEmit()"
                        />

                    </div>

                </div>

            </div>
        </div>
        <!-- CHECKBOX AREA -->

        <!-- IMPAGINAZIONE -->
        <!-- <div class="btn-container" v-if="showPagination">

            <button
                :disabled = "nearbyApartments.length <= 4"
                @click="getSponsoredApartments(pagination.current - 1)">
                &lt;&lt;
            </button>

            <button
                :disabled = "pagination.current === pagination.last"
                @click="getSponsoredApartments(pagination.current + 1)">
                >>
            </button>

        </div> -->

    </div>
</template>

<script>
    import ButtonComp from '../elements/ButtonComp.vue';
    import CardSection from './CardSection.vue';
    import {apiUrlTomTom, apiUrlDatabase} from '../../data/apiConfig';
    import haversine from 'haversine-distance';

    export default {
        name: "CheckboxComp",

        data() {
            return {

                // ApiUrl e coordinate
                apiUrlTomTom,
                apiUrlDatabase,
                tomtomKey: 'laZ0bbuHjk1Qf0HdMzIuCx3fPRECKycn',
                position: {
                    apartment: {},
                    user: {}
                },
                // pagination: {
                //     start: null,
                //     last: null,
                // },
                showPagination: false,

                // Appartamenti
                apartments: [],
                nearbyApartments: [],

                sponsoredApartments: [],
                sponsoredNearbyApartments: [],

                // Filtri ricerca
                radius: 20,
                address: '',
                rooms: '',
                beds: '',
                selectedServices: [],

                // Servizi
                servicesList1: [],
                servicesList2: []
            };
        },
        methods: {
            addressSearchApi(){
                axios.get(this.apiUrlTomTom + this.address + '.json' + '?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=' + this.tomtomKey)
                    .then(res => {
                        this.position.user = res.data.results[0].position;
                        console.log(this.position.user);
                    })
            },

            getApartments(){
                axios.get(this.apiUrlDatabase)
                    .then(res => {
                        this.apartments = res.data;
                        console.log(this.apartments, 'tutti gli appartamenti')
                    })
            },

            getSponsoredApartments(){
                axios.get(this.apiUrlDatabase + 'sponsored/')
                    .then(res => {
                        this.sponsoredApartments = res.data;
                        console.log(this.sponsoredApartments, 'appartamenti sponsorizzati')
                    })
            },

            getServices(){
                this.firstServicesList(1);
                this.secondServicesList(2);
            },

            firstServicesList(page){
                axios.get(this.apiUrlDatabase + 'services/?page=' + page)
                    .then(res => {
                        res.data.data.forEach(service => {
                            service ={
                                id: service.id,
                                name: service.name,
                                icon: service.icon,
                                click: false
                            }
                            this.servicesList1.push(service)
                        });
                        console.log(this.servicesList1, 'prima lista');
                    })
            },
            secondServicesList(page){
                axios.get(this.apiUrlDatabase + 'services/?page=' + page)
                    .then(res => {
                        res.data.data.forEach(service => {
                            service ={
                                id: service.id,
                                name: service.name,
                                icon: service.icon,
                                click: false
                            }
                            this.servicesList2.push(service)
                        });
                        console.log(this.servicesList2, 'seconda lista');
                    })
            },

            distanceCalculator(array){
                array.forEach(apartment => {
                    this.position.apartment = {
                        latitude: apartment.latitude,
                        longitude: apartment.longitude,
                    };

                    const distance = haversine(this.position.apartment, this.position.user);
                    console.log((distance / 1000).toFixed(), 'distanza app da indirizzo');

                    if((distance / 1000).toFixed() < parseInt(this.radius)){
                        if(array === this.apartments){
                            this.nearbyApartments.push(apartment);
                        }
                        if(array === this.sponsoredApartments){
                            this.sponsoredNearbyApartments.push(apartment);
                        }
                        console.log('distanza scelta', parseInt(this.radius));
                    }
                });
            },

            apartmentsPush(){
                this.nearbyApartments = [];
                this.sponsoredNearbyApartments = [];

                this.distanceCalculator(this.apartments);
                this.distanceCalculator(this.sponsoredApartments);
                console.log(this.nearbyApartments, 'APPARTAMENTI VICINI');
                console.log(this.sponsoredNearbyApartments, 'APPARTAMENTI VICINI SPONSORIZZATI');
            },

            // apartmentsPagination(array){
            //     this.pagination = {
            //         start: array.slice(0,4),
            //         last: array.slice(array.length - 4, array.length)
            //     };

            //     if(this.pagination.start != this.pagination.last){
            //         this.showPagination = true;
            //     }
            // },

            apartmentEmit(){
                this.apartmentsPush();
                this.$emit('apartments', this.apartmentsWithRooms);
                // this.apartmentsPagination(this.nearbyApartments);
                console.log(this.apartmentsWithRooms, 'computed');
                console.log(this.selectedServices.sort(function(a, b){return a-b}), 'servizi selezionati');
            },
            sponsoredApartmentEmit(){
                this.$emit('sponsoredApartments', this.sponsoredNearbyApartments);
                // this.apartmentsPagination(this.sponsoredNearbyApartments);
            },
        },

        computed:{
            apartmentsWithRooms(){
                let apartmentsWithRooms = this.nearbyApartments;

                if(this.rooms > 0){
                    apartmentsWithRooms = this.nearbyApartments.filter(apartment => apartment.rooms >= this.rooms);
                }

                if(this.beds > 0){
                    apartmentsWithRooms = this.nearbyApartments.filter(apartment => apartment.beds >= this.beds);
                }

                if(this.selectedServices.length !== 0){
                    apartmentsWithRooms = [];

                    // let c = 0;

                    // this.nearbyApartments.forEach(apartment => {
                    //     let serviceIncluded = true

                    //     apartment.services.forEach(service => {
                    //         if(c <= this.selectedServices.length){

                    //             if(this.selectedServices.sort(function(a, b){return a-b}).includes(service.id)){
                    //                 serviceIncluded = true
                    //                 validService++
                    //                 console.log(validService, 'servizi validi');
                    //             }
                    //             else{
                    //                 serviceIncluded = false
                    //             }

                    //             c++

                    //         }

                    //     });

                    //     apartmentsWithRooms = apartment.services.filter(service => this.selectedServices.includes(service.id));

                    //     apartmentsWithRooms = this.nearbyApartments.map(services => services.filter(service => service.id === 1));

                    //     apartmentsWithRooms = this.nearbyApartments.filter(apartment =>{
                    //         return apartment.services.filter(service => service.id === 1);
                    //     })

                    //     console.log(this.selectedServices.length, 'lunghezza array');

                    //     console.log(c, 'log di C');

                    //     if(serviceIncluded && validService == this.selectedServices.length){
                    //         apartmentsWithRooms.push(apartment)
                    //     }

                    // });

                    // apartmentsWithRooms = this.nearbyApartments.filter(apartment => apartment.services.some(service => service.id == 1))

                    // apartmentsWithRooms = this.nearbyApartments.filter(apartment => apartment.services.some(service => {
                    //     let serviceIncluded = true

                    //     if(c < this.selectedServices.length){

                    //         if(this.selectedServices.sort(function(a, b){return a-b}).includes(service.id)){
                    //             serviceIncluded = true
                    //             validService++
                    //             console.log(validService, 'servizi validi');
                    //         }
                    //         else{
                    //             serviceIncluded = false
                    //         }

                    //         c++

                    //         console.log(this.selectedServices.length, 'lunghezza array');

                    //         console.log(c, 'log di C');

                    //     }

                    //     if(serviceIncluded && validService == this.selectedServices.length){
                    //         return true
                    //     }else{
                    //         return false
                    //     }

                    // }));

                    apartmentsWithRooms = this.nearbyApartments.filter(apartment => {
                        let validService = 0;

                        return apartment.services.some(service => {
                            let serviceIncluded = true

                            if(this.selectedServices.sort(function(a, b){return a-b}).includes(service.id)){
                                serviceIncluded = true
                                validService++
                                console.log(validService, 'servizi validi');
                            }
                            else{
                                serviceIncluded = false
                            }

                            console.log(this.selectedServices.length, 'lunghezza array');

                            if(serviceIncluded && validService == this.selectedServices.length){
                                return true
                            }else{
                                return false
                            }

                        })
                    });

                }

                return apartmentsWithRooms;
            },
        },

        mounted(){
            // console.log(this.apiUrlDatabase);
            this.getServices();
            this.getApartments();
            this.getSponsoredApartments();
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

