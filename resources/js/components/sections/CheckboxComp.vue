<template>
    <div>

        <h1 class="text-center">Cerca il tuo BnB ideale</h1>

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

    h1{
        font-size: 48px;
        margin-top: 20px;
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

    input[type=checkbox] {
        transform: scale(1.5);
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

    @media screen and (max-width: 400px) {
        h1 {
            margin: 0 40px;
        }

        ul {
            padding: 0;
        }
    }
</style>

