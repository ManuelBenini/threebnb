<template>
    <div class="about-us-section">

        <div class="row custom-container">

            <div class="col-lg-4 col-md-12 col-sm-12 about-text">
                <h2>{{ about[counter].title }}</h2>
                <p>{{ about[counter].text }}</p>

                <div class="slider">
                    <span
                     @click="counter = 0"
                     :class="this.counter == 0 ? 'active' : '' ">1
                    </span>

                    <span
                     @click="counter = 1"
                     :class="this.counter == 1 ? 'active' : '' ">2
                    </span>

                    <span
                     @click="counter = 2"
                     :class="this.counter == 2 ? 'active' : '' ">3
                    </span>
                </div>
            </div>

            <div class="img-container text-center">
                <img :src="about[counter].img" :alt="about[counter].title">
            </div>

        </div>

    </div>
</template>

<script>

export default {
    name: 'AboutComp',

    data(){
        return{
            counter: 0,
            about:[
                {
                    title: "Chi siamo",
                    text: "Siamo la piattaforma su cui puoi fare affidamento per trovare il tuo bnb ideale. Crediamo nella capacità di fare la differenza, per questo tutti i nostri bnb sono realizzati con materie prime ecosostenibili e ad impatto zero.",
                    img: "https://images.contentstack.io/v3/assets/bltfa2cefdbe7482368/bltcfe32ad33e97bbed/5f5a61332d8d464b43a53626/DenverFeature_1200x630.jpg"
                },
                {
                    title: "Perchè sceglierci",
                    text: "Tutti i nostri bnb sono moderni, vicino alla natura ed ecosostenibili. Garantiamo eccellenza al miglior rapporto qualità-prezzo possibile! Scegliendo i nostri bnb otterrai comfort, benessere e prezzi accessibili ad ogni stagione!",
                    img: "https://images.contentstack.io/v3/assets/bltfa2cefdbe7482368/bltc6f7c14c70c7db16/5f4d553799431928ffc0df9c/Atlanta_header1200x630.jpg"
                },
                {
                    title: "La nostra missione",
                    text: "Vogliamo rivoluzionare il mondo travel permettendo a chiunque di viaggiare. Siamo riusciti nel nostro intento garantendo a tutti i nostri iscritti appartamenti economici, moderni e vicino alla natura.",
                    img: "https://images.contentstack.io/v3/assets/bltfa2cefdbe7482368/blte6275d47f2e91243/5f5fcf575e85ad4dee18eb0f/Miamifeature_1200x630.jpg"
                },
            ]
        }
    }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/front/partials/vars';

.about-us-section{

    margin: 80px 0;

    .about-text{

        margin-right: 80px;
        margin-bottom: 30px;

        p{
            margin: 20px 0;
            font-size: 20px;
        }

        .slider{

            display: flex;
            justify-content: center;

            padding: 5px;
            border-radius: 30px;

            width: 120px;

            background-color: $colore-primario;

            text-align: center;

            cursor: pointer;

            span{
                display: block;

                width: 25px;
                color: white;
                text-align: center;
                margin-right: 10px;

                border-radius: 50%;
                margin-right: 5px;

            }

            .active{
                background-color: #3D3D3D;

            }
        }
    }



    .img-container{
        width: 500px;
        height: 250px;

        img{
            width: 100%;
            height: 100%;
            border-radius: 20px;
            margin-left: 20px;
        }
    }

    @media screen and (max-width: 560px) {

        .about-us-section{
            margin: 20px 0;
        }
        .img-container{
            width: 300px;
            height: 150px;
        }

        p{
            font-size: 18px;
        }
    }

}

</style>
