<template>

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
</template>

<script>
    export default {
        name: 'ContactsForm',
        props:{
        }
    }
</script>

<style lang="scss" scoped>

button{
    background-color: #EB594E;
    font-weight: 500;
    border: none;
    &:hover{
        background-color: #a33a33;
    }
}

</style>
