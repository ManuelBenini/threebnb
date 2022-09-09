<template>
    <div>


        <h2>{{apartment.title}}</h2>

        <div class="immagineapp">
            <img :src="`../storage/${apartment.image}`" :alt="apartment.title" class="rounded">
            <h6 v-if="apartment.sponsorships.length > 0">Sponsorizzato</h6>
        </div>

        <div>
            <div class="row mt-5 mb-5">
                <!--Colonna host e proprietà-->
                <div id="szdettagli" class="col-md-6 p-3">

                    <div class="row ">
                        <div class="col-md-2">
                            <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Mario Rossi">

                        </div>

                        <div class="col-md-9 d-flex align-self-center">
                            <h3>Host: {{apartment.user}}</h3>
                        </div>
                    </div>

                    <div id="servizi" class="pt-2">
                        <br><h4>Servizi offerti</h4>
                        <ul>
                            <li
                            v-for="(service, index) in this.apartment.services"
                            :key="index">
                                {{service.name}}
                            </li>

                        </ul>
                    </div>

                    <div>
                        <a href="/admin/">Torna ai tuoi appartamenti</a>
                    </div>

                </div>

                <!--Colonna form-->
               <ContactsForm :apartmentid="apartment.id" v-if="apartment.userId != apartment.loggedUserId"
               />

            </div>
        </div>


    </div>
</template>

<script>
import ContactsForm from '../elements/ContactsForm.vue';
import {apiUrlDatabase} from '../../data/apiConfig';

    export default {
        name: "ApartmentDetails",
        components: { ContactsForm },

        data(){
            return{
                apiUrlDatabase,
                apartment: {
                    id: undefined,
                    title: '',
                    image: '',
                    user: '',
                    loggedUserId: '',
                    userId: '',
                    services: [],
                    sponsorships: [],
                    lat: '',
                    lon: ''
                }
            }
        },

        mounted(){
            this.apiRequest()
        },

        methods: {
            apiRequest(){
                axios.get(this.apiUrlDatabase + 'apartment-details/' + this.$route.params.id)
                    .then(res => {
                        this.apartment.id = res.data.id;

                        console.log(this.apartment.id, 'id appartamento');

                        this.apartment.title = res.data.title;

                        this.apartment.image = res.data.image;

                        this.apartment.services = res.data.services;

                        this.apartment.sponsorships = res.data.sponsorships;

                        this.apartment.user = res.data.user.name + ' ' + res.data.user.surname;

                        this.apartment.userId = res.data.user.id;

                        this.apartment.loggedUserId = window.Id;

                        console.log(this.apartment.userId, 'Id Proprietario Appartamento');

                        console.log(this.apartment.loggedUserId, 'Id Utente Loggato');

                        this.apartment.lat = res.data.latitude;

                        this.apartment.lon = res.data.longitude;

                        console.log('appartamento: ', res.data);

                    })
            },
        }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/front/partials/vars';

a {
    background-color: $colore-primario;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #FFFFFF;
    text-decoration: none;
}

h6 {
    position: absolute;
    top: 175px;
    right: 135px;
    font-weight: bold;
    color: $colore-primario;
    background-color: #FFFFFF;
    padding: 8px 15px;
    border-radius: 10px;
    font-size: 18px;
}

.immagineapp {
    height: 500px;
    background-color: blue;
    border-radius: 30px;
    overflow: hidden;
}

img {
    position: relative;
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

</style>
