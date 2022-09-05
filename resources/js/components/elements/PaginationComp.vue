<template>

    <div class="text-center pagination-container">

    <!-- Inserire  v-if="pagination.current != 1" OPPURE :disabled-->
    <button
        class="custom-button"
        :disabled = "pagination.current === 1"
        @click="getSponsoredApartments(pagination.current - 1)">
        <i class="fa-solid fa-arrow-left"></i>
    </button>

    <button
        class="custom-button"
        v-for="i in pagination.last"
        :key="`btn${i}`"
        @click="getSponsoredApartments(i)"
        :disabled = "pagination.current === i" >
        {{i}}
    </button>

    <!-- Inserire v-if="pagination.current != pagination.last" OPPURE :disabled-->
    <button
        class="custom-button"


        :disabled = "pagination.current === pagination.last"
        @click="getSponsoredApartments(pagination.current + 1)">
        <i class="fa-solid fa-arrow-right"></i>
    </button>

    </div>

</template>

<script>
export default {

    name: 'PaginationComp',

    data(){
        return{
            pagination: {
                current: 2,
                last: 2,
            },
            showPagination: false
        }
    },

}
</script>

<style lang="scss" scoped>

.pagination-container{

    .custom-button{

        border: none;
        border-radius: 10px;
        padding: 20px;
        width: 64px;
        margin-right: 5px;

    }

}

</style>
