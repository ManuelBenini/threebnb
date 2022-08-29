<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-12 col-sm-10">

                    <h1 class="text-center">Cerca il tuo BnB ideale</h1>

                    <div class="checkbox flex-wrap">



                        <form action="inserire-percorso">
                            <label v-for="(search, index) in advancedSearch" :key="`search${index}`" >
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

                    <div class="search">
                        <button class="align-items-center" type="">Ricerca</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'CheckboxComp',

        data() {
            return {
                clicked: false,
                advancedSearch: [
                    {
                        name: 'Wi-Fi',
                        href: '#',
                        icon: 'fa-solid fa-wifi',
                        click: false
                    },
                    {
                        name: 'Posto Macchina',
                        href: '#',
                        icon: 'fa-solid fa-square-parking',
                        click: false
                    },
                    {
                        name: 'Piscina',
                        href: '#',
                        icon: 'fa-solid fa-person-swimming',
                        click: false
                    },
                    {
                        name: 'Portineria',
                        href: '#',
                        icon: 'fa-solid fa-bell-concierge',
                        click: false
                    },
                    {
                        name: 'Sauna',
                        href: '#',
                        icon: 'fa-solid fa-hot-tub-person',
                        click: false
                    },
                    {
                        name: 'Vista Mare',
                        href: '#',
                        icon: 'fa-solid fa-house-flood-water',
                        click: false
                    },
                    {
                        name: 'Aria Condizionata',
                        href: '#',
                        icon: 'fa-regular fa-snowflake',
                        click: false
                    },
                    {
                        name: 'Camino',
                        href: '#',
                        icon: 'fa-solid fa-fire',
                        click: false
                    },
                    {
                        name: 'Idromassaggio',
                        href: '#',
                        icon: 'fa-solid fa-bath',
                        click: false
                    },
                ]
            }
        },

        methods: {

        }
    }





</script>

<style lang="scss" scoped>

    ul {
        list-style: none;
    }

    li {
        margin: 0 2px;
        text-align: center;
        text-decoration: none;
        text-transform: none;
        color: #979797;
        transition: color .2s ease-in-out;
        font-size: 18px;
        border-bottom: 2px solid transparent;

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

    .checkbox, .search {
        display: flex;
        justify-content: center;
    }

    input[type=checkbox] {
        transform: scale(1.5);
    }

    input:checked + label{
        color: red;
    }

    button {
        border: none;
        padding: 10px 55px;
        border-radius: 10px;
        background-color: #191DFF;
        color: #FFFFFF;
        font-size: 18px;
        font-weight: 200;
        transition: .3s ease-in-out;

        &:hover {
            background-color: #0048ff;
            font-weight: 600;
            transition: color .2s ease-in;
        }
    }

    .selected {
        color: #000000;
        transition: .2s ease-in-out;
        border-bottom: 2px solid #979797
    }

    .no-selected {
        color: #979797;
    }


</style>
