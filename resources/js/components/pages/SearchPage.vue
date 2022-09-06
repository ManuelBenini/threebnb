<template>
    <div>

        <CheckboxComp
        @filters="getFilters"
        />

        <div >
            <CardSection
                :filters="filters"
                :sponsored="true"
                :searchSuccesfull="searchSuccesfull"
                message="In evidenza"
                researchMessage="Le tue ricerche appariranno qui."
            />

            <CardSection
                :filters="filters"
                :sponsored="false"
                :searchSuccesfull="searchSuccesfull"
                message="in base alle tue ricerche"
                researchMessage="Le tue ricerche appariranno qui."
            />
        </div>

    </div>
</template>

<script>
import CheckboxComp from '../sections/CheckboxComp.vue';
import CardSection from '../sections/CardSection.vue';

    export default {
        name: "SearchPage",
        components: { CheckboxComp, CardSection},

        data(){
            return{
                filters: {},

                searchSuccesfull: false,
            }
        },

        methods: {
            getFilters(filters){
                this.filters = filters;
                console.log(this.filters, 'Filtri ricevuti');
            }
        },

    }

</script>

<style lang="scss" scoped>

</style>
