<!-- Questo componente gestisce la sezione in cui stamperemo le card dei singoli appartamenti -->

<template>
    <div class="custom-container">

        <h2>Appartamenti <span class="orange-text"> {{message}}</span></h2>

        <div class="card-section" v-if="sponsored">


            <CardComp
            v-if="sponsoredNearbyApartments.length !== 0"
            v-for="(apartment,index) in this.sponsoredNearbyApartments"
            :key="`apartment${index}`"
            :apartment="apartment"
            :sponsordistance= "sponsoredDistances[index].distance"
            :sponsored="true"
            />

            <p v-if="sponsoredNearbyApartments.length === 0">Nessun appartamento trovato</p>

        </div>

        <div class="card-section" v-if="!sponsored">


            <CardComp
            v-if="nearbyApartments.length !== 0"
            v-for="(apartment,index) in this.nearbyApartments"
            :key="`apartment${index}`"
            :apartment="apartment"
            :appdistance= "apartmentDistances[index].distance"
            :sponsored="false"
            />

            <p v-if="nearbyApartments.length === 0">Nessun appartamento trovato</p>

        </div>


    </div>
</template>

<script>
import CardComp from '../elements/CardComp.vue';
    export default {
        name: "CardSection",
        components: { CardComp },

        props:{
            message:{
                type: String,
                Required: true
            },
            nearbyApartments:{
                type: Array,
                Required: true
            },
            sponsoredNearbyApartments:{
                type: Array,
                Required: true
            },
            sponsored:{
                type: Boolean,
                Required: true
            },
            apartmentDistances:{
                type: Array,
                Required: true
            },
            sponsoredDistances:{
                type: Array,
                Required: true
            },
        },

        mounted(){
            console.log(this.sponsoredDistances[5].distance, 'prop distanze in cardsection');
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
