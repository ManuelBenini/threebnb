<template>
    <div>
        <h2>{{apartment.title}}</h2>

        <div class="immagineapp">
            <img :src="`../storage/${apartment.image}`" :alt="apartment.title" class="rounded">
        </div>

        <div>
            <div class="row mt-5 mb-5">
                <!--Colonna host e proprietà-->
                <div id="szdettagli" class="col-md-6 p-3">

                    <div class="row ">
                        <div class="col-md-2">
                            <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Mario Rossi">
                        </div>
                        <div class="col-md-6 d-flex align-self-center">
                            <h3>Nome Host: {{apartment.user}}</h3>
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

                </div>

                <!--Colonna form-->
               <ContactsForm
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
                    title: '',
                    image: '',
                    user: '',
                    services: [],
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
                        this.apartment.title = res.data.title
                        this.apartment.image = res.data.image

                        this.apartment.services = res.data.services;
                        console.log(this.apartment.services);

                        this.apartment.user = res.data.user.name + ' ' + res.data.user.surname
                        console.log(typeof this.apartment.user);

                        this.apartment.lat = res.data.latitude
                        this.apartment.lon = res.data.longitude

                        console.log('appartamento: ', res.data);

                    })
            },
        }
}
</script>

<style lang="scss" scoped>

.immagineapp{
    height: 500px;
    background-color: blue;
    border-radius: 30px;
    overflow: hidden;
}

img{
    background-color: red;
    height: 100%;
    width: 100%;
}

#szdettagli img{
    width: 80px;
    border-radius: 100px;
}

ul{
    list-style: none;
    padding: 0;
}

#host{
    display: inline-block;
}

</style>
