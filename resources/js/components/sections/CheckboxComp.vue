<template>
    <div>

        <h1 class="text-center">Cerca il tuo BnB ideale</h1>

        <!-- SEARCH APP -->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center search-app">
                        <form action="">
                            <input class="input-city" type="text" placeholder="Inserisci la tua destinazione...">
                            <input class="input-numb" type="number" min="1" max="999" placeholder="N° stanze">
                            <input class="input-numb" type="number" min="1" max="999" placeholder="N° letti">
                            <div class="distance">
                                <label class="text-center" for="distance">20 km</label>
                                <input class="input-km" type="number" placeholder="Distanza max (km)">
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
                                <label v-for="(search, index) in advancedSearchList1" :key="`search${index}`" >
                                    <div class="card-service">

                                        <ul>
                                            <li :class="(search.click ? 'selected' : 'no-selected')" id="#service">
                                                <a :href="search.href"></a>
                                                <input @click="search.click = !search.click" class="mr-3" type="checkbox">
                                                <i class :class="search.icon"></i>
                                                <p>{{ search.name }}</p>
                                            </li>
                                        </ul>

                                    </div>

                                </label>
                            </form>

                        </div>

                        <div class="col-6 service-list-2">

                            <form action="inserire-percorso">
                                <label v-for="(search, index) in advancedSearchList2" :key="`search${index}`" >
                                    <div class="card-service">

                                        <ul>
                                            <li :class="(search.click ? 'selected' : 'no-selected')" id="#service">
                                                <a :href="search.href"></a>
                                                <input @click="search.click = !search.click" class="mr-3" type="checkbox">
                                                <i :class="search.icon"></i>
                                                <p>{{ search.name }}</p>
                                            </li>
                                        </ul>

                                    </div>
                                </label>
                            </form>
                        </div>

                    </div>

                    <div class="search">

                        <ButtonComp
                            callToAction="Ricerca"
                            stile="arancione"
                        />

                    </div>

                </div>

            </div>
        </div>
        <!-- CHECKBOX AREA -->

        <div>
            <CardSection
                message="in evidenza"
                />
        </div>

        <div>
            <CardSection
                message="in base alle tue ricerche"
                />
        </div>

    </div>
</template>

<script>
import ButtonComp from '../elements/ButtonComp.vue';
import CardSection from './CardSection.vue';

    export default {
        name: "CheckboxComp",

        data() {
            return {
                clicked: false,

                advancedSearchList1: [
                    {
                        name: "Wi-Fi",
                        href: "#",
                        icon: "fa-solid fa-wifi",
                        click: false
                    },

                    {
                        name: "Posto Macchina",
                        href: "#",
                        icon: "fa-solid fa-square-parking",
                        click: false
                    },

                    {
                        name: "Piscina",
                        href: "#",
                        icon: "fa-solid fa-person-swimming",
                        click: false
                    },

                    {
                        name: "Portineria",
                        href: "#",
                        icon: "fa-solid fa-bell-concierge",
                        click: false
                    },

                    {
                        name: "Idromassaggio",
                        href: "#",
                        icon: "fa-solid fa-bath",
                        click: false
                    },
                ],

                advancedSearchList2: [
                    {
                        name: "Camino",
                        href: "#",
                        icon: "fa-solid fa-fire",
                        click: false
                    },


                    {
                        name: "Aria Condizionata",
                        href: "#",
                        icon: "fa-regular fa-snowflake",
                        click: false
                    },

                    {
                        name: "Sauna",
                        href: "#",
                        icon: "fa-solid fa-hot-tub-person",
                        click: false
                    },

                    {
                        name: "Vista Mare",
                        href: "#",
                        icon: "fa-solid fa-house-flood-water",
                        click: false
                    },

                    {
                        name: "BBQ",
                        href: "#",
                        icon: "fa-solid fa-bacon",
                        click: false
                    },

                ]
            };
        },
        methods: {},
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

        form .input-numb, form .input-km {
            width: 33%;
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
            width: 30%;
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

