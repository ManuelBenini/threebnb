<!-- Questo componente gestisce la sezione in cui stamperemo le card dei singoli appartamenti -->

<template>
    <div class="custom-container">

        <h2>Appartamenti in evidenza scelti per te!</h2>

        <div class="card-section">

            <CardComp
            title="Surprising stay next door"
            previewText="Find unique spaces nearby that turn any trip into an andventure"
            />
            <CardComp
            title="Surprising stay next door"
            previewText="Find unique spaces nearby that turn any trip into an andventure"
            />
            <CardComp
            title="Surprising stay next door"
            previewText="Find unique spaces nearby that turn any trip into an andventure"
            />
            <CardComp
            title="Surprising stay next door"
            previewText="Find unique spaces nearby that turn any trip into an andventure"
            />

        </div>


    </div>
</template>

<script>
import CardComp from '../elements/CardComp.vue';
    export default {
    name: "CardSection",
    components: { CardComp }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/front/partials/vars';

.custom-container{
    padding: 40px 0 60px 0;

    .card-section{
        display: flex;
        flex-wrap: wrap;
    }


}

</style>
