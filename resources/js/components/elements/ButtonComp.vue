<template>
    <button :class="stile">
        {{callToAction}}
    </button>
</template>

<script>
    export default {
        name: 'ButtonComp',
        props:{

            callToAction:{
                type: String,
                required: true
            },

            stile:{
                type: String,
                required: true
            }
        }
    }
</script>

<style lang="scss" scoped>

@import '../../../sass/front/partials/vars';

    button {
            border: none;
            border-radius: 10px;

            padding: 10px 30px;

            color: #FFFFFF;
            font-size: 18px;
            font-weight: 200;

            cursor: pointer;
    }

    .arancione{
        background-color: $colore-primario;
        transition: 0.5s;
    }

    .arancione:hover {
        font-size: 24px;
        padding: 5.5px 33px;
    }

    .rosso{
        background-color: red;
    }

    .blu{
        background-color: blue;
    }

    .verde{
        background-color: green;
    }




</style>
