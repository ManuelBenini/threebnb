<template>
    <div>
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
               <ContactsForm/>

            </div>
        </div>

            
    </div>
</template>

<script>
import ContactsForm from '../elements/ContactsForm.vue';
    export default {
    name: "ApartmentDetails",
    components: { ContactsForm }
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

</style>
