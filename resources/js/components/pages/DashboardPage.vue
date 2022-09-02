<template>
    <div>
        <div class="container-fluid">
            <div class="row d-flex justify-content-between">

                <div class="logo">
                    LOGO
                </div>

                <div class="hamburger">
                    MENU
                </div>

            </div>

            <div class="row">
                <div class="col-3 user">
                    <div class="col text-center mt-3 profile">
                        <ul>
                            <li><img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Unknown-person.gif" alt=""></li>
                            <li><h5>NOME UTENTE</h5></li>
                            <li><h5>REGISTRATO DAL </h5></li>
                            <li><a href="#">MODIFICA PROFILO</a></li>
                        </ul>
                    </div>

                </div>

                <!-- <ul class="d-flex justify-content-between">
                    <li>
                        <ButtonComp
                        callToAction="Modifica"
                        stile="blu"
                        />
                    </li>
                    <li><ButtonComp
                        callToAction="Statistiche"
                        stile="giallo"
                        />
                    </li>
                    <li><ButtonComp
                        callToAction="Sponsor"
                        stile="verde"
                        /></li>
                </ul> -->

                <div class="col-9 ">

                    <div class="col-4 app text-center py-2" v-for="(apartment,  index) in apartmentsList" :key="`apartment${index}`">

                            <h1>{{ apartment.title }}</h1>
                            <a href="#">
                                <img :src="apartment.image" alt="">
                            </a>

                            <ul class="d-flex justify-content-around">
                                <li>
                                    <ButtonComp
                                    callToAction="Modifica"
                                    stile="blu"
                                    />
                                </li>
                                <li>
                                    <ButtonComp
                                    callToAction="Statistiche"
                                    stile="giallo"
                                    />
                                </li>
                                <li>
                                    <ButtonComp
                                    callToAction="Sponsor"
                                    stile="verde"
                                    />
                                </li>
                            </ul>

                    </div>

                    <div class="col-12 d-flex justify-content-center my-3">
                        <ButtonComp
                            callToAction="Aggiungi Appartamento"
                            stile="arancione"
                        />
                    </div>
                </div>


            </div>
        </div>

    </div>
</template>

<script>
    import ButtonComp from '../elements/ButtonComp.vue';


    export default {
    name: "DashboardPage",
    components: { ButtonComp },


    data() {
        return {
            apartmentsList: [
                {
                    title: "Primary",
                    image: "https://www.ibizalowcost.com/wp-content/uploads/2018/01/living-appartamento-ikebanab3b-ibiza.jpg",
                },
                {
                    title: "Secondary",
                    image: "https://cdn.lionard.com/wmcdnorigin/110/254323.jpg",
                },
                {
                    title: "Pri",
                    image:
                    "https://cdn.lionard.com/wmcdnorigin/110/254323.jpg",
                },
                {
                    title: "Secon",
                    image:
                    "https://www.ibizalowcost.com/wp-content/uploads/2018/01/living-appartamento-ikebanab3b-ibiza.jpg",
                },
                {
                    title: "Primar",
                    image:
                    "https://www.ibizalowcost.com/wp-content/uploads/2018/01/living-appartamento-ikebanab3b-ibiza.jpg",
                },
                {
                    title: "Sec",
                    image:
                    "https://cdn.lionard.com/wmcdnorigin/110/254323.jpg",
                },
            ]
        }
    }

};



</script>

<style lang="scss" scoped>
    ul {
        padding: 0;
    }

    button {
        padding: 10px 15px;
    }

    .profile img {
        width: 180px;
        height: 180px;
        border-radius: 50%
    }

    .app img {
        border-radius: 20px;
        width: 100%;
        height: 65%;
        margin: 15px 0px;
    }

    .profile li {
        padding: 5px 0px;
    }

    .container-fluid {
        border: 1px solid black;
        background-color: green;
    }
    .logo, .hamburger, .user {
        border: 1px solid black;
        background-color: yellow;
    }
    .app {
        border: 1px solid black;
        background-color: red;
    }
    .btn {
        font-size: 13px;
    }


    .col-9 {
        display: flex;
        flex-wrap: wrap
    }
</style>


