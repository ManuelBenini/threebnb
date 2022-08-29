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
                    <div class="col">
                        <ul>

                            <li><h5>FOTO UTENTE</h5></li>
                            <li><h5>NOME UTENTE</h5></li>
                            <li><h5>REGISTRATO DAL </h5></li>
                            <li><a href="#">MODIFICA PROFILO</a></li>
                        </ul>
                    </div>

                </div>


                <div class="col-9">

                    <div class="col-4 app">
                        <img class="w-100 mb-3" src="https://www.lago.it/wp-content/uploads/2017/10/Lago-Appartamento-Store-Arnhem-1.jpg" alt="">
                        <ul class="d-flex justify-content-between">
                            <li><button class="btn btn-primary">MODIFICA</button></li>
                            <li><button class="btn btn-warning">STATISTICHE</button></li>
                            <li><button class="btn btn-success">SPONSOR</button></li>
                        </ul>
                    </div>

                    <div class="col-4 app">
                        <img class="w-100 mb-3" src="https://www.lago.it/wp-content/uploads/2017/10/Lago-Appartamento-Store-Arnhem-1.jpg" alt="">
                        <ul class="d-flex justify-content-between">
                            <li><button class="btn btn-primary">MODIFICA</button></li>
                            <li><button class="btn btn-warning">STATISTICHE</button></li>
                            <li><button class="btn btn-success">SPONSOR</button></li>
                        </ul>
                    </div>

                    <div class="col-4 app">
                        <img class="w-100 mb-3" src="https://www.lago.it/wp-content/uploads/2017/10/Lago-Appartamento-Store-Arnhem-1.jpg" alt="">
                        <ul class="d-flex justify-content-between">
                            <li><button class="btn btn-primary">MODIFICA</button></li>
                            <li><button class="btn btn-warning">STATISTICHE</button></li>
                            <li><button class="btn btn-success">SPONSOR</button></li>
                        </ul>
                    </div>

                    <div class="col-4 app">
                        <img class="w-100 mb-3" src="https://www.lago.it/wp-content/uploads/2017/10/Lago-Appartamento-Store-Arnhem-1.jpg" alt="">
                        <ul class="d-flex justify-content-between">
                            <li><button class="btn btn-primary">MODIFICA</button></li>
                            <li><button class="btn btn-warning">STATISTICHE</button></li>
                            <li><button class="btn btn-success">SPONSOR</button></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'DashboardPage'
    }
</script>

<style lang="scss" scoped>

    ul {
        padding: 0;
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
