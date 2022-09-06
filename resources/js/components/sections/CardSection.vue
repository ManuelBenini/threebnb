<!-- Questo componente gestisce la sezione in cui stamperemo le card dei singoli appartamenti -->

<template>
    <div class="custom-container">

        <h2>Appartamenti <span class="orange-text"> {{message}}</span></h2>

        <div v-if="sponsored">

            <div class="card-section">

                <CardComp
                v-for="(apartment,index) in this.sponsoredApartments"
                :key="`apartment${index}`"
                :apartment="apartment"
                :sponsored="true"
                />

                <div class="message">
                    <p v-if="!searchSuccesfull">{{researchMessage}}</p>
                    <p v-if="sponsoredApartments.length < 1 && searchSuccesfull">Nessun appartamento trovato.</p>
                </div>

            </div>

            <PaginationComp />

        </div>

        <div v-if="!sponsored">

            <div class="card-section">

                <CardComp
                v-if="apartments.length !== 0"
                v-for="(apartment,index) in this.apartments"
                :key="`apartment${index}`"
                :apartment="apartment"
                :sponsored="false"
                />

                <div class="message">
                    <p v-if="!searchSuccesfull">{{researchMessage}}</p>
                    <p v-if="apartments.length < 1 && searchSuccesfull">Nessun appartamento trovato.</p>
                </div>

            </div>

            <PaginationComp />

        </div>



    </div>
</template>

<script>

    import CardComp from '../elements/CardComp.vue';
    import PaginationComp from '../elements/PaginationComp.vue';

    export default {
        name: "CardSection",
        components: { CardComp, PaginationComp },

        props:{
            message:{
                type: String,
                Required: true
            },
            apartments:{
                type: Array,
                Required: true
            },
            researchMessage:{
                type: String,
                Required: false
            },
            sponsoredApartments:{
                type: Array,
                Required: true
            },
            sponsored:{
                type: Boolean,
                Required: true
            },
            searchSuccesfull:{
                type: Boolean,
                Required: true,
            }
        },

        watch:{
            sponsoredApartments(){
                console.log(this.sponsoredApartments, 'watch cardsection');
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
