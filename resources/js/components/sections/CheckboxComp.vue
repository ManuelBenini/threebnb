<template>
    <div>

        <h1 class="text-center">Cerca il tuo BnB ideale</h1>

        <!-- SEARCH APP -->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center mt-4 search-app">
                        <form action="">
                            <div class="destination">
                                <label class="text-center" for="rooms">Inserisci la tua destinazione</label>
                                <input class="input-city text-center" type="text" v-model="filters.address">
                            </div>
                            <div class="rooms">
                                <label class="text-center" for="rooms">N° Stanze</label>
                                <input v-model="filters.rooms" class="input-numb" type="number" min="1" max="999">
                            </div>
                            <div class="beds">
                                <label class="text-center" for="beds">N° Letti</label>
                                <input v-model="filters.beds" class="input-numb" type="number" min="1" max="999">
                            </div>
                            <div class="distance">
                                <label class="text-center" for="distance">Distanza (km)</label>
                                <input v-model="filters.radius" class="input-km" type="number" placeholder="Distanza max (km)">
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


                    <div class="checkbox flex-wrap mb-4">

                        <div class="col-6 service-list-1">

                            <form action="inserire-percorso">
                                <label v-for="(service, index) in servicesList1" :key="`service${index}`" >
                                    <div class="card-service">

                                        <ul>
                                            <li :class="(service.click ? 'selected' : 'no-selected')" id="#service">
                                                <input @click="service.click = !service.click" class="mr-3" type="checkbox" :value="service.id" v-model="filters.selectedServices">
                                                <i :class="service.icon"></i>
                                                <p>{{ service.name }}</p>
                                            </li>
                                        </ul>

                                    </div>

                                </label>

                                <!-- POSIZIONI SUGGERITE -->
                                <div id="recommendedPositions" v-for="(position, index) in recommendedPositions" :key="`position${index}`">
                                    <ul>
                                        <li @click="filters.address = position.address.freeformAddress">{{position.address.freeformAddress}}</li>
                                    </ul>
                                </div>

                            </form>

                        </div>

                        <div class="col-6 service-list-2">

                            <form action="inserire-percorso">
                                <label v-for="(service, index) in servicesList2" :key="`service${index}`" >
                                    <div class="card-service">

                                        <ul>
                                            <li :class="(service.click ? 'selected' : 'no-selected')" id="#service">
                                                <input @click="service.click = !service.click" class="mr-3" type="checkbox" :value="service.id" v-model="filters.selectedServices">
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
                            :disabled="filters.address.length < 3"
                            callToAction="Ricerca"
                            stile="arancione"
                            @click.native="filtersAndCoordinates()"
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
                recommendedPositions: [],

                // Filtri ricerca
                filtes:{
                    radius: '20',
                    address: '',
                    rooms: '0',
                    beds: '0',
                    selectedServices: [0],
                    position: {
                        lat: 0,
                        lon: 0
                    },
                    startResearch: false
                },

                // Servizi
                servicesList1: [],
                servicesList2: []
            };
        },

        watch:{
            'filters.address'(){
                this.addressSearchApi();
            }
        },

        methods: {
            addressSearchApi(){
                axios.get(this.apiUrlTomTom + this.filters.address + '.json?limit=5&minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=' + this.tomtomKey)
                    .then(res => {
                        this.filters.position.lat = res.data.results[0].position.lat;
                        this.filters.position.lon = res.data.results[0].position.lon;

                        this.recommendedPositions = res.data.results;

                        console.log(this.recommendedPositions, 'posizioni suggerite');
                        console.log(this.filters.position, 'coordinate tomtom');
                    })
            },

            getServices(){
                this.servicesList(1, this.servicesList1);
                this.servicesList(2, this.servicesList2);
            },

            servicesList(page, array){
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

            filtersAndCoordinates(){
                this.filters.startResearch = !this.filters.startResearch;
                console.log(this.filters.startResearch);
                this.$emit('filters', this.filters);
                console.log(this.filters, 'EMIT DI FILTRI');
            }
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
        color: #979797;
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

    .destination, .rooms, .beds, .distance  {
        display: flex;
        flex-direction: column;
    }

    form .input-city, form .input-numb, form .input-km {
        margin: auto;
    }

    .destination, .rooms, .beds {
        border-right: 1px solid #979797;
        align-content: center;
    }

    form .input-numb {
        width: 110px;
        text-align: center;

    }

    form .input-km {
        width: 130px;
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

    @media screen and (max-width: 748px) {
        .checkbox{
            width: 80%;
            margin: 0 auto;
            margin-top: 40px;
            margin-bottom: 10px;
        }

        .card-service {
            width: 135px;
        }

        .destination {
            width: 100%;
            text-align: center;
            border-right: none;
        }

        .rooms, .beds, .distance {
            width: 33%;
        }
    }

    @media screen and (max-width: 646px) {
        .destination {
            border-right: none;
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
        .destination, .beds, .distance {
            border-right: none;
            text-align: center;
        }

        .rooms {
            border-right: 1px solid #979797;
            padding-right: 10px;
        }
        .distance {
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

        .rooms, .beds, .destination, .distance {
            margin: auto;
            padding: 5px 0px;
            border-right: none;
            width: 100%;
        }

        .destination, .rooms, .beds {
            border-bottom: 1px solid #979797;
        }




        .search-app form {
            flex-direction: column;
        }
    }

    // /MEDIA QUERY

</style>
