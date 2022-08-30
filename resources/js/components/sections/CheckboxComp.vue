<template>
    <div>

        <h1 class="text-center">Cerca il tuo BnB ideale</h1>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center search-app">
                        <form action="">
                            <input class="input-city" type="text" placeholder="Inserisci la tua destinazione...">
                            <input class="input-numb" type="number" placeholder="N° stanze">
                            <input class="input-numb" type="number" placeholder="N° letti">
                            <input class="input-km" type="number" placeholder="Distanza max (km)">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid checkbox-area">
            <div class="row">
                <div class="col">


                    <div class="checkbox flex-wrap">

                        <div class="col-6 service-list-1">

                            <form action="inserire-percorso">
                                <label v-for="(search, index) in advancedSearchList1" :key="`search${index}`" >
                                    <ul>
                                        <li :class="(search.click ? 'selected' : 'no-selected')" id="#service">
                                            <a :href="search.href"></a>
                                            <input @click="search.click = !search.click" class="mr-2" type="checkbox">
                                            <i :class="search.icon"></i>
                                            <p>{{ search.name }}</p>
                                        </li>
                                    </ul>

                                </label>
                            </form>

                        </div>

                        <div class="col-6 service-list-2">

                            <form action="inserire-percorso">
                                <label v-for="(search, index) in advancedSearchList2" :key="`search${index}`" >
                                    <ul>
                                        <li :class="(search.click ? 'selected' : 'no-selected')" id="#service">
                                            <a :href="search.href"></a>
                                            <input @click="search.click = !search.click" class="mr-2" type="checkbox">
                                            <i :class="search.icon"></i>
                                            <p>{{ search.name }}</p>
                                        </li>
                                    </ul>

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
                        name: "Palestra",
                        href: "#",
                        icon: "fa-solid fa-dumbbell",
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

    form .input-numb {
        width: 100px;

    }

    form .input-km {
        width: 160px;
    }

    form .input-city, form .input-numb {
        border-right: 1px solid #979797;
        align-content: center;

    }

    // /SEARCH APP


    // CHECKBOX AREA

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

        .service-list-2 li {
            margin: 0 10px;
        }
    }
    @media screen and (max-width: 1463px) {
        .service-list-1 li {
            margin: 0 17px;
        }

        .service-list-2 li {
            margin: 0 13px;
        }
    }

    @media screen and (max-width: 1263px) {
        .service-list-1 li {
            margin: 0 17px;
        }

        .service-list-2 li {
            margin: 0 13px;
        }
    }

    @media screen and (max-width: 740px) {
        .checkbox{
            width: 80%;
            margin: 0 auto;
            margin-top: 40px;
            margin-bottom: 10px;
        }


    }

    @media screen and (max-width: 500px){
        h1 {
            margin: 0 40px;
        }
    }

    @media screen and (max-width: 455px){
        form .input-city, form .input-numb {
            border-right: none;
            text-align: center;
            // border-bottom: 1px solid #979797;
        }

        form .input-numb {
            border-right: 1px solid #979797;
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

        ul {
            padding: 0;
        }
    }

    // /MEDIA QUERY

</style>

