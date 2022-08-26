<template>
    <div class="hero-section">
        <div class="call-to-action-area">
            <div class="call-to-action">
                <h1>Trova il bnb <br> piu adatto alle <br> tue esigenze</h1>
                <button>Esplora</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'HeroComp'
    }
</script>

<style lang="scss" scoped>

@import '../../../sass/front/partials/vars';

.hero-section{
    height: 700px;

    background-image: url('../../../assets/cover2.jpeg');
    background-repeat: no-repeat;
    background-size: cover;

    margin-top: -110px;
    padding-top: 270px;

    .call-to-action-area{
        width: 90%;
        margin: 0 auto;

        .call-to-action{

            max-width: 460px;

            h1{
                color: white;
                font-size: 53px;
            }

            button{

                width: 120px;

                margin-top: 10px;
                padding: 0px 5px ;

                border-radius: 30px;
                border: 1px solid $colore-primario;

                font-size: 24px;
                color: white;
                background-color: $colore-primario;

                cursor: pointer;

            }


        }

    }

}

</style>
