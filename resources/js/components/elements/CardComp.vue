<template>
    <router-link
        :to="{name: 'apartment', params:{id: apartment.id}}">
        <div class="card">
            <div class="bg-image">
                <img :src="apartment.image" alt="">
            </div>

            <div class="post-data">
                <h2>{{ apartment.title }}</h2>
            </div>

            <div>
                <p>{{ services }}</p>
            </div>

            <!-- <div class="post-data" v-if="sponsored">
                <p>Distanza: {{sponsordistance}}Km</p>
            </div>

            <div class="post-data" v-else>
                <p>Distanza: {{appdistance}}Km</p>
            </div> -->

        </div>
    </router-link>

</template>

<script>
    export default {
        name: 'CardComp',

        props:{
            apartment:{
                type: Object,
                required: true
            },

            sponsored:{
                type: Boolean,
                required: true
            }
        },
    }
</script>

<style lang="scss" scoped>

    .card {
        display: flex;
        flex-direction: column;
        width: 280px;
        height: 250px;
        margin: 10px;
        border-radius: 10px;
        box-shadow: 1px 1px 12px -5px #5b5a5a;
        cursor: pointer;

        .bg-image {
            height: 150px;

            img {
                width: 100%;
                height: 100%;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }
        }

        .post-data {
            padding: 20px;

            h2 {
                margin-bottom: 10px;
                font-size: 16px;
                font-weight: 600;
                color: #000000;

                &:hover {
                    text-decoration: none;
                }
            }

            p {
                color: gray;
                font-size: 16px;
            }
        }

    }

    @media screen and (max-width: 1516px) {
        .card {
            width: 305px;
        }
    }
    @media screen and (max-width: 1235px) {
        .card {
            width: 250px;
        }
    }

    @media screen and (max-width: 724px) {
        .card {
            width: 300px;
            height: 230px;
        }
    }
    @media screen and (max-width: 400px) {
        .card {
            width: 250px;
            height: 220px;
        }
    }


</style>
