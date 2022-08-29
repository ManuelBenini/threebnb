<template>
    <div class="container">
       
        <h2>Nome dell'appartamento</h2>

        <div class="immagineapp">
            <img src="" alt="" class="rounded">
        </div>

        <div>
            <div class="row mt-4">
                <!--Colonna host e proprietà-->
                <div id="szdettagli" class="col-md-6 p-3">

                    <div id="host">

                        <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Mario Rossi">
                        <h3>Nome dell'host</h3>

                    </div>
                    <div id="descrizione" class="pt-2">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, veniam. Dolore consectetur delectus dicta illo eaque id quisquam officiis facilis enim perspiciatis. Eum quos exercitationem repellendus odio in nulla pariatur amet a eius repudiandae, nobis fuga iste, voluptatum facere modi earum magnam saepe? Consectetur officia voluptate, temporibus eligendi sequi modi.</p>
                    </div>

                    <div id="servizi" class="pt-2">
                        <ul>
                            <li>Servizio</li>
                            <li>Servizio</li>
                            <li>Servizio</li>
                            <li>Servizio</li>
                            <li>Servizio</li>
                            <li>Servizio</li>
                        </ul>
                    </div>

                </div>

                <!--Colonna form-->
                <div id="szform" class="col-md-6 p-3">
                    <h3 class="mb-3">Contatta l'host</h3>
                    <form>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Inserisci la email">
                        </div>

                        <div class="form-group">
                            <label for="testo">Testo</label>
                            <textarea class="form-control" id="teto" rows="4"></textarea>
                        </div>

                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="privacypolicy">
                            <label class="form-check-label" for="privacypolicy">Accetto i termini della Privacy Policy</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </form>


                </div>

            </div>
        </div>

         <div class="immagineapp">
            <img src="" alt="" class="rounded" id="mappa">
        </div>

    </div>
</template>

<script>
    export default {
        name: 'ApartmentPage'
    }
</script>

<style lang="scss" scoped>

.immagineapp{
    height: 500px;
    background-color: red;
    border-radius: 30px;
    overflow: hidden;
}

img{
    background-color: blue;
    height: 100%;
    width: 100%;
}

#szdettagli img{
    width: 80px;
    border-radius: 100px;
}

#servizi ul{
    list-style: none;
    padding: 0;
}

</style>
