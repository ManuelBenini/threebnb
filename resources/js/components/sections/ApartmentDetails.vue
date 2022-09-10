<template>
    <div class="mt-3">

        <div v-if="apartment.userId == apartment.loggedUserId" class="back-to-profile">
            <a class="back-to-app" href="/admin/">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Torna al profilo</span>
            </a>
        </div>

        <h2 class="text-center mt-4 mb-3">{{apartment.title}}</h2>

        <div class="immagineapp">
            <img :src="`../storage/${apartment.image}`" :alt="apartment.title" class="rounded">
            <span class="sponsor-label" v-if="apartment.sponsorships.length > 0">Sponsorizzato</span>
        </div>

        <div>
            <div class="row mt-5 mb-5">
                <!--Colonna host e proprietà-->
                <div id="szdettagli" class="col-md-6 p-3">

                    <div class="row ">
                        <!-- <div class="col-md-2">
                            <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Mario Rossi">
                        </div> -->

                        <div class="col-md-9 d-flex align-self-center">
                            <h3>Host: {{apartment.user}}</h3>
                        </div>
                    </div>

                    <div class="apartment-details">

                        <h4 class="my-4">Dettaglio Appartamento </h4>
                        <ul>
                            <li>
                                <strong>Indirizzo: </strong>
                                <span>{{apartment.address}}</span>
                            </li>
                            <li>
                                <strong>Bagni: </strong>
                                <span>{{apartment.bathrooms}}</span>
                            </li>
                            <li>
                                <strong>Letti: </strong>
                                <span>{{apartment.beds}}</span>
                            </li>
                            <li>
                                <strong>Stanze: </strong>
                                <span>{{apartment.rooms}}</span>
                            </li>
                            <li>
                                <strong>M²: </strong>
                                <span>{{apartment.sqm}}</span>
                            </li>
                        </ul>
                    </div>



                    <div id="service" class="pt-2">
                        <br><h4>Servizi offerti </h4>
                        <ul>
                            <li
                            v-for="(service, index) in this.apartment.services"
                            :key="index">
                                {{service.name}}
                            </li>
                        </ul>
                    </div>

                </div>

                <!--Colonna form-->
               <ContactsForm :apartmentid="apartment.id" v-if="apartment.userId != apartment.loggedUserId"
               />

               <StatisticsComp :viewsArray="[allViews ,
                apartmentViews]"
               />

            </div>
        </div>


    </div>
</template>

<script>
import ContactsForm from '../elements/ContactsForm.vue';
import {apiUrlDatabase} from '../../data/apiConfig';
import StatisticsComp from '../elements/StatisticsComp.vue';

    export default {
        name: "ApartmentDetails",
        components: { ContactsForm, StatisticsComp },

        data(){
            return{
                apiUrlDatabase,
                apartment: {
                    id: undefined,
                    title: '',
                    address: '',
                    bathrooms: '',
                    beds: '',
                    rooms: '',
                    sqm: '',
                    image: '',
                    user: '',
                    loggedUserId: '',
                    userId: '',
                    services: [],
                    sponsorships: [],
                    lat: '',
                    lon: ''
                },
                ip: {
                    clientIp: '',
                    apartmentId: 0,
                },
                allViews: 0,
                apartmentViews: 0,
            }
        },

        methods: {
            apiRequest(){
                axios.get(this.apiUrlDatabase + 'apartment-details/' + this.$route.params.id)
                    .then(res => {
                        this.apartment.id = res.data.id;
                        this.ip.apartmentId = res.data.id;

                        // console.log(this.apartment.id, 'id appartamento');

                        this.apartment.title = res.data.title;

                        this.apartment.image = res.data.image;

                        this.apartment.address = res.data.address;

                        this.apartment.bathrooms = res.data.bathrooms;

                        this.apartment.beds = res.data.beds;

                        this.apartment.rooms = res.data.rooms;

                        this.apartment.sqm = res.data.sqm;

                        this.apartment.services = res.data.services;

                        this.apartment.sponsorships = res.data.sponsorships;

                        this.apartment.user = res.data.user.name + ' ' + res.data.user.surname;

                        this.apartment.userId = res.data.user.id;

                        this.apartment.loggedUserId = window.Id;

                        // console.log(this.apartment.userId, 'Id Proprietario Appartamento');

                        // console.log(this.apartment.loggedUserId, 'Id Utente Loggato');

                        this.apartment.lat = res.data.latitude;

                        this.apartment.lon = res.data.longitude;

                        // console.log('appartamento: ', res.data);

                        this.getApartmentViews();

                        this.getClientIp();

                        this.getAllViews();

                    })
            },

            getClientIp(){
                axios.get('https://api.ipify.org?format=json')
                .then( res => {
                    this.ip.clientIp = res.data.ip;
                    console.log(this.ip.clientIp);
                    this.sendClientIp();
                });
            },

            getAllViews(){
                axios.get(this.apiUrlDatabase + 'get-all-views')
                .then( res => {
                    this.allViews = res.data.length;
                    console.log(this.allViews, 'Visualizzazioni di ogni appartamento');
                });
            },

            getApartmentViews(){
                axios.get(this.apiUrlDatabase + 'get-apartment-views/' + this.apartment.id)
                .then( res => {
                    this.apartmentViews = res.data.length;
                    console.log(this.apartmentViews, 'Visualizzazioni dell\'appartamento');
                });
            },

            sendClientIp(){
                axios.post(this.apiUrlDatabase + 'add-view', this.ip)
                .then((sendedData) => {
                    console.log(this.ip);
                    console.log(sendedData, 'CHIAMATA POST VISUALIZZAZIONE');
                });
            },
        },

        mounted(){
            this.apiRequest();
        }
}
</script>

<style lang="scss" scoped>

    @import '../../../sass/front/partials/vars';

    .back-to-app {
        color: #929292;
        text-decoration: none;
        transition: 0.5s;
    }

    .back-to-app:hover {
        color: $colore-primario;
        font-size: 19px;
    }

    .back-to-app span {
        margin-left: 12px;
    }

    .sponsor-label {
        position: absolute;
        top: 15px;
        right: 20px;
        font-weight: bold;
        color: $colore-primario;
        background-color: #FFFFFF;
        padding: 5px 8px;
        border-radius: 10px;
    }

    .immagineapp {
        height: 50%;
        width: 100%;
        background-color: blue;
        border-radius: 30px;
        overflow: hidden;
        position: relative;
    }

    img {
        background-color: red;
        height: 100%;
        width: 100%;
    }

    #szdettagli img {
        width: 80px;
        border-radius: 100px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    #host {
        display: inline-block;
    }

    .apartment-details {
        margin-top: 20px;
    }

    .apartment-details li {
        margin-bottom: 5px;
        margin-left: 25px;
    }

    #service li {
        margin-bottom: 5px;
        margin-left: 25px;
    }


</style>
