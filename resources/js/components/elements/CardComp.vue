<template>
    <div class="card">
        <div class="bg-image">
            <img :src="apartment.image" alt="">
        </div>

        <div class="post-data">
            <h2>{{ apartment.title }}</h2>
        </div>

        <!-- <div class="post-data" v-if="sponsored">
            <p>Distanza: {{sponsordistance}}Km</p>
        </div>

        <div class="post-data" v-else>
            <p>Distanza: {{appdistance}}Km</p>
        </div> -->

    </div>
</template>

<script>
    export default {
        name: 'CardComp',

        props:{
            apartment:{
                type: Object,
                required: true
            },
            // appdistance:{
            //     type: String,
            //     required: true
            // },
            // sponsordistance:{
            //     type: String,
            //     required: true
            // },
            sponsored:{
                type: Boolean,
                required: true
            }
        },
        mounted() {
            // console.log(this.appdistance, 'ECCOMI');
        },

    }
</script>

<style lang="scss" scoped>

.card{

    width: 280px;

    display: flex;
    flex-direction: column;

    margin-top: 20px;
    // margin-right: 40px;

    border-radius: 10px;

    box-shadow: 1px 1px 12px -5px #5b5a5a;

    cursor: pointer;


    .bg-image{

        height: 150px;

        img{
            width: 100%;
            height: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    }

    .post-data{
        padding: 20px;

        h2{
            font-size: 24px;
            margin-bottom: 10px;
        }

        p{
            color: gray;
            font-size: 16px;

        }
    }

}

</style>
